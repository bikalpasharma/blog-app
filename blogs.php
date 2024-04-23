<?php
// Include database connection
include 'includes/db.php';

// Fetch blogs from the database
$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Blog App</h1>
        <div class="blogs">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="blog">
                    <h2><?php echo $row['title']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                    <a href="view.php?id=<?php echo $row['id']; ?>">View Blog</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
