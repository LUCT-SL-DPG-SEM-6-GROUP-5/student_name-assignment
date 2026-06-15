<?php
include 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Health Articles</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            Digital Health Awareness System
        </a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="about.php">About</a>
            <a class="nav-link active" href="health_articles.php">Articles</a>
            <a class="nav-link" href="health_alerts.php">Alerts</a>
            <a class="nav-link" href="contact.php">Contact</a>
        </div>

    </div>
</nav>

<!-- Header -->

<div class="bg-success text-white text-center py-5">

    <h1>Health Articles</h1>

    <p class="lead">
        Learn about disease prevention, healthy lifestyles,
        nutrition, sanitation, and public health awareness.
    </p>

</div>

<!-- Search Form -->

<div class="container mt-4">

    <form method="GET">

        <div class="input-group">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search health articles...">

            <button class="btn btn-success">
                Search
            </button>

        </div>

    </form>

</div>

<!-- Articles -->

<div class="container mt-5">

    <div class="row">

<?php

if(isset($_GET['search']) && !empty($_GET['search'])){

    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM articles
         WHERE title LIKE '%$search%'
         OR category LIKE '%$search%'
         OR content LIKE '%$search%'
         ORDER BY id DESC"
    );

}else{

    $query = mysqli_query(
        $conn,
        "SELECT * FROM articles ORDER BY id DESC"
    );
}

if(mysqli_num_rows($query) > 0){

    while($row = mysqli_fetch_assoc($query)){
?>

        <div class="col-md-4">

            <div class="card shadow mb-4">

                <div class="card-body">

                    <span class="badge bg-success">
                        <?php echo $row['category']; ?>
                    </span>

                    <h4 class="mt-3">
                        <?php echo $row['title']; ?>
                    </h4>

                    <p>
                        <?php echo substr($row['content'],0,150); ?>...
                    </p>

                    <small class="text-muted">
                        Posted:
                        <?php echo $row['created_at']; ?>
                    </small>

                </div>

            </div>

        </div>

<?php
    }
}else{

    echo "
    <div class='alert alert-info'>
        No articles found.
    </div>";
}
?>

    </div>

</div>

<!-- Footer -->

<footer class="bg-dark text-white text-center p-4 mt-5">

    <p>
        Digital Health Awareness System © 2026
    </p>

</footer>

</body>
</html>