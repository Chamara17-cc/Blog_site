<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Food Blog Post</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/add_post_styles.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/maincontainer.css'); ?>" />
</head>

<body>
    <div class="container">
       
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

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>