<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/header_styles.css'); ?>" />
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            overflow: auto;
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            position: relative;
            box-shadow: 0px 0px 10px 0px #000000;
        }

        .close {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 25px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <nav class="navbar container">
            <div class="navbar-brand">Yummy.</div>
            <ul class="navbar-nav1">
                <li><a href="<?= base_url() . 'admin/dashboard' ?>" class="active">Home</a></li>
                <li><a href="<?= base_url() . 'header/myprofile' ?>">My</a></li>
                <li><a href="#" onclick="openModal()">Add Post</a></li>
                <li><a href="<?= base_url() . 'header/contact_us' ?>">Contact Us</a></li>
            </ul>
            <div class="logoutbtn">
                <a href="<?= base_url() . 'login/login_user' ?>">Logout</a>
            </div>
        </nav>
    </div>
    <div id="addPostModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <h1 style="color:rgb(218, 113, 38);">Create a New Food Blog Post</h1>
            <form id="blogForm" action="<?= base_url('api/add_post_controller/addpost') ?>" method="post" enctype="multipart/form-data">
                <label for="image-upload">Upload Dish Image</label>
                <div class="file-upload" onclick="document.getElementById('image-upload').click()">
                    <p>Click to upload or drag and drop</p>
                    <input type="file" id="image-upload" name="image" accept="image/*" style="display: none" onchange="previewImage(event)">
                    <img id="image-preview" class="image-preview" style="display: none;">
                </div>

                <label for="title">Recipe Title</label>
                <input type="text" id="title" name="title" placeholder="Enter your recipe name" required>

                <div class="foodtype">
                    <select name="foodtype" id="foodtype">
                        <option value="breakfast">Breakfast Food</option>
                        <option value="lunch">Lunch Food</option>
                        <option value="teatime">Tea Time</option>
                        <option value="snack">Snack</option>
                        <option value="dinner">Dinner Food</option>
                    </select>
                </div>
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Tell the story behind this recipe..." rows="3"></textarea>

                <label for="ingrediants">Ingredients</label>
                <textarea id="ingrediants" name="ingrediants" placeholder="List ingredients (one per line)" rows="3"></textarea>

                <label for="instructions">Cooking Instructions</label>
                <textarea id="instructions" name="instructions" placeholder="Step-by-step cooking instructions..." rows="5"></textarea>

                <label for="tags">Tags</label>
                <input type="text" id="tags" name="tags" placeholder="Add tags (comma-separated)">

                <button type="submit" class="submit-btn">Publish Recipe</button>
            </form>
        </div>
    </div>
    <script>
        function openModal() {
            document.getElementById('addPostModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('addPostModal').style.display = 'none';
        }

        window.onclick = function(event) {
            var modal = document.getElementById('addPostModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>

</body>

</html>