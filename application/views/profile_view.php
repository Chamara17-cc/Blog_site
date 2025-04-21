<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/profile_view_styles.css'); ?>" />
</head>

<body>
    <div class="header">
        <?php $this->load->view('header') ?>
    </div>


    <div class="container2">
        <div class="profile-header">
            <div class="cover-photo"></div>
            <div class="profile-info">
                <img class="profile-photo" src="<?= $selecteduser['profile_photo_link'] ?>" alt="Profile Image">
                <h2><?= $selecteduser['first_name'] . ' ' . $selecteduser['last_name'] ?></h2>
            </div>
        </div>

        <div class="profile-content">
            <h3>About</h3>
            <div class="aboutme">
                <?= $selecteduser['aboutme'] ?>
            </div>

            <div class="info-section">
                <p><strong>Email:</strong> <?= $selecteduser['email'] ?></p>
                <p><strong>Phone:</strong> <?= $selecteduser['phone_number'] ?></p>
                <p><strong>Gender:</strong> <?= $selecteduser['gender'] ?></p>
                <p><strong>Birthday:</strong> <?= $selecteduser['dob'] ?></p>
                <p><strong>Location:</strong> <?= $selecteduser['city'] . ', ' . $selecteduser['state'] ?></p>
            </div>
        </div>
    </div>

    <?php foreach ($userposts as $post): ?>
        <section class="post-container">
            <div class="post-header">
                <div class="user-avatar">
                    <img src="<?= $post['photolink']; ?>" alt="Post Image" onerror="this.onerror=null; this.src='<?php echo base_url('assets/images/3.jpg'); ?>';">
                </div>
                <div class="user-info">
                    <span class="post-time">Posted <?= $post['posted_date']; ?></span>
                </div>
            </div>

            <div class="post-content">
                <div class="topline">
                    <h2><?= $post['title']; ?></h2>

                </div>

                <p class="post-text"><?= substr($post['description'], 0, 1500); ?>...</p>
                <div class="post-image">
                    <img src="<?= $post['photolink']; ?>" alt="Post Image" onerror="this.onerror=null; this.src='<?php echo base_url('assets/images/3.jpg'); ?>';">
                </div>
            </div>

            <div class="post-actions">
                <button class="read-more-btn" data-post-id="<?= $post['postid']; ?>">Read More</button>
                <div class="editdelete">
                    <a href=""><button style="background-color: green;">Edit</button></a>
                    <a href="<?= base_url('deletepost/' . $post['postid'] . '/' . $post['userid']); ?>" onclick="return confirm('Are you sure you want to delete this post?')"> <button style="background-color: red;">Delete</button></a>
                </div>
            </div>
        </section>

        <div class="modal" id="modal-<?= $post['postid']; ?>">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2><?= $post['title']; ?></h2>
                <p><?= $post['description']; ?></p>
                <p>Type : <?= $post['type']; ?></p>
                <p>Ingrediants : <?= $post['ingrediants']; ?></p>
                <p>Instructions : <?= $post['instructions']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
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
        });
    </script>
</body>

</html>