<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yummy - Delicious Healthy Food</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL,GRAD@400,0,0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard_styles.css'); ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php $this->load->view('header') ?>
    <section class="hero container">
        <div class="hero-content">
            <h1>Enjoy Your Healthy Delicious Food</h1>
            <p>"We are a team of culinary storytellers and web designers, crafting tasteful food blogs with Bootstrap flair."</p>
            <div class="hero-buttons">
            </div>
        </div>
        <div class="hero-image">
            <img src="<?php echo base_url('assets/images/3.jpg'); ?>" alt="Delicious Healthy Food" style="object-fit: cover;" width="800" height="800" />
        </div>
    </section>
    <div class="post">
        <?php foreach ($posts as $post): ?>
            <section class="post-container">
                <div class="post-header">
                    <div class="user-avatar">
                        <img src="<?= $post['photolink']; ?>" alt="Post Image" onerror="this.onerror=null; this.src='<?php echo base_url('assets/images/3.jpg'); ?>';">
                    </div>
                    <div class="user-info">
                        <a href="<?= base_url('profile/' . $post['userid']); ?>">
                            <h3><?= $post['first_name'] . ' ' . $post['last_name']; ?></h3>
                        </a>
                        <span class="post-time">Posted <?= $post['posted_date']; ?></span>
                    </div>
                </div>

                <div class="post-content">
                    <h2><?= $post['title']; ?></h2>
                    <p class="post-text"><?= substr($post['description'], 0, 150); ?>...</p>
                    <div class="post-image">
                        <img src="<?= $post['photolink']; ?>" alt="Post Image" onerror="this.onerror=null; this.src='<?php echo base_url('assets/images/3.jpg'); ?>';">
                    </div>
                </div>

                <div class="post-actions">
                    <button class="read-more-btn" data-post-id="<?= $post['postid']; ?>">Read More</button>
                </div>
            </section>

            <!-- Modal Dialog (hidden by default) -->
            <div class="modal" id="modal-<?= $post['postid']; ?>">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h2><?= $post['title']; ?></h2>
                    <p><?= $post['description']; ?></p>
                    <p><b>Type :</b> <?= $post['type']; ?></p>
                    <p><b>Ingrediants :</b><?= $post['ingrediants']; ?></p>
                    <p><b>Instructions :</b> <?= $post['instructions']; ?></p>
                </div>
            </div>

            <div class="like" style="margin-left: 35%;">
                <button class="like-btn" data-postid="<?= $post['postid']; ?>" data-userid="<?= $post['userid']; ?>" data-liketype="1">
                    <span class="material-symbols-outlined">thumb_up</span>
                </button>
                <p class="like-count" id="like-count-<?= $post['postid']; ?>">
                    👍 <?= $post['like_count']; ?> &nbsp;&nbsp; 👎 <?= $post['dislike_count']; ?>
                </p>
                <button class="like-btn" data-postid="<?= $post['postid']; ?>" data-userid="<?= $post['userid']; ?>" data-liketype="2">
                    <span class="material-symbols-outlined">thumb_down</span>
                </button>
            </div>
        <?php endforeach; ?>

        <footer class="dashboard-footer">
            <?php $this->load->view('footer', ['photolink' => $photolink]); ?>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const readMoreBtns = document.querySelectorAll('.read-more-btn');
                readMoreBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const postId = this.getAttribute('data-post-id');
                        const modal = document.getElementById('modal-' + postId);
                        if (modal) {
                            modal.style.display = 'block';
                        }
                    });
                });

                const closeBtns = document.querySelectorAll('.close-btn');
                closeBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const modal = this.closest('.modal');
                        modal.style.display = 'none';
                    });
                });

                window.addEventListener('click', function(event) {
                    if (event.target.classList.contains('modal')) {
                        event.target.style.display = 'none';
                    }
                });

                // Like button styling (using jQuery)
                $(document).ready(function() {
                    $(".likebtn").click(function() {
                        $(this).toggleClass("active");
                    });
                });

                // Like button AJAX logic
                document.querySelectorAll(".like-btn").forEach(button => {
                    button.addEventListener("click", function() {
                        const postid = this.getAttribute("data-postid");
                        const likeCountSpan = document.querySelector(`#like-count-${postid}`); // Target the specific like count for the post

                        const liketype = this.getAttribute("data-liketype");
                        const userid = this.getAttribute("data-userid");

                        fetch("<?= base_url('updatelike') ?>", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/x-www-form-urlencoded"
                                },
                                body: `postid=${postid}&userid=${userid}&type=${liketype}`
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === "success") {
                                    // Fetch updated like count after the like is updated
                                    fetch("<?= base_url('getpostlikes/') ?>" + postid)
                                        .then(response => response.json())
                                        .then(likeData => {
                                            if (likeData.status === "success" && likeData.like_count) {
                                                // Update like count for this specific post
                                                likeCountSpan.innerHTML = `👍 ${likeData.like_count.like_count} &nbsp;&nbsp; 👎 ${likeData.like_count.dislike_count}`;
                                            } else {
                                                console.error("Like data is not in the expected format", likeData);
                                            }
                                        });
                                } else {
                                    alert("Error: " + data.message);
                                }
                            })
                            .catch(error => console.error("Error:", error));
                    });
                });

            });
        </script>

</body>

</html>