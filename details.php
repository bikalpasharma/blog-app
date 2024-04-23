<?php
include 'includes/db.php';

// Fetch blog details
$blog_id = $_GET['id'];
$sql = "SELECT * FROM blogs WHERE id=$blog_id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    // Handle the case when blog with given ID doesn't exist
    echo "Blog not found.";
    exit();
}

$blog = mysqli_fetch_assoc($result);

// Fetch comments for this blog
$sql_comments = "SELECT * FROM comments WHERE blog_id=$blog_id";
$result_comments = mysqli_query($conn, $sql_comments);

if (!$result_comments) {
    // Handle the case when comments couldn't be fetched
    echo "Error fetching comments.";
    exit();
}
?>

<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blog['title']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="blog-details">
            <h2><?php echo $blog['title']; ?></h2>
            <p><?php echo $blog['description']; ?></p>
            <img src="<?php echo $blog['photo']; ?>" alt="Blog Photo"><br><br>
<br>
<hr/>
            <h3>Comments</h3>
            <div class="comments">
                <?php while($comment = mysqli_fetch_assoc($result_comments)): ?>
                    <div class="comment">
                        <p><?php echo $comment['comment']; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
            <br/>
<hr/>
            <h3>Post a Comment</h3>
            <div class="post-comment">
                <form action="submit_comment.php" method="POST">
                    <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
                    <textarea id="comment" name="comment" required></textarea><br><br>
                    <input type="submit" value="Post Comment">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php include 'includes/footer.php'; ?>
