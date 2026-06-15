<?php
include 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Health Alerts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            Digital Health Awareness System
        </a>

        <div class="navbar-nav ms-auto">

            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="about.php">About</a>
            <a class="nav-link" href="health_articles.php">Articles</a>
            <a class="nav-link active" href="health_alerts.php">Alerts</a>
            <a class="nav-link" href="contact.php">Contact</a>

        </div>

    </div>
</nav>

<div class="container mt-5">

    <h1 class="mb-4">Health Alerts</h1>

    <p class="lead">
        Stay informed with the latest public health announcements and alerts.
    </p>

    <?php

    $result = mysqli_query(
        $conn,
        "SELECT * FROM alerts ORDER BY id DESC"
    );

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
    ?>

        <div class="alert alert-warning shadow-sm mb-4">

            <h4>
                <?php echo $row['title']; ?>
            </h4>

            <p>
                <?php echo $row['message']; ?>
            </p>

            <small class="text-muted">
                Posted: <?php echo $row['created_at']; ?>
            </small>

        </div>

    <?php
        }
    } else {
        echo "<div class='alert alert-info'>No health alerts available.</div>";
    }
    ?>

</div>

<footer class="bg-dark text-white text-center p-3 mt-5">

    <p>
        Digital Health Awareness System © 2026
    </p>

</footer>

</body>
</html>