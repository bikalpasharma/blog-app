<?php
include 'includes/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $blog_id = $_POST['blog_id'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (blog_id, user_id, comment) VALUES ($blog_id, $user_id, '$comment')";
    mysqli_query($conn, $sql);

    header("Location: details.php?id=$blog_id");
    exit();
}
?>
