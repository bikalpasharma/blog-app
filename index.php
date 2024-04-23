<?php
// Include database connection
include 'includes/db.php';

// Fetch blogs from the database
$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);
?>
<?php
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog App</title>
    <link rel="stylesheet" href="css/style.css">
    <style>

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.blogs {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    grid-gap: 20px;
}

.blog {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.blog h2 {
    margin-top: 0;
    font-size: 1.5rem;
}

.blog p {
    margin-bottom: 10px;
}

.blog a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

.blog a:hover {
    background-color: #555;
}

        </style>
</head>

<body>
    <div class="container">
        <div class="blogs">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="blog">
                <img src="images/<?php echo $row['photo']; ?>" alt="Image" style="height:180px"/><br/><br/>
                    <h2><?php echo $row['title']; ?></h2>
                    <p><?php echo $row['description']; ?></p>                    
                    <a href="details.php?id=<?php echo $row['id']; ?>">View Blog</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
<?php
include 'includes/footer.php';
?>
