<?php
include 'includes/header.php';
?>
<div class="form-container">

<h2>Create a New Blog Post</h2>
<form action="submit_post.php" method="POST" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>
    <label for="photo">Photo:</label>
    <input type="file" id="photo" name="photo"><br><br>
    <input type="submit" value="Post">
</form>
</div>
<?php include 'includes/footer.php'; ?>
