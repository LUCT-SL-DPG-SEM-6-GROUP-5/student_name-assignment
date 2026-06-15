<?php
include 'config/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Health Awareness System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .hero{
            background: linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),
            url('assets/images/hero.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            text-align: center;
        }

        .section-title{
            margin-top: 50px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            Digital Health Awareness
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="health_articles.php">Articles</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="health_alerts.php">Alerts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<!-- Hero Section -->

<section class="hero">

    <div class="container">

        <h1>Digital Health Awareness System</h1>

        <p class="lead">
            Promoting health education, disease prevention,
            and public health awareness.
        </p>

        <a href="health_articles.php"
           class="btn btn-warning btn-lg">

            Read Health Articles

        </a>

    </div>

</section>

<!-- Statistics -->

<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="section-title">Our Impact</h2>
        <p class="text-muted">Helping people stay informed, healthy, and connected through reliable health awareness.</p>
    </div>

    <div class="row gy-4 text-center">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="display-4 text-success mb-3">
                        <i class="bi bi-journal-medical"></i>
                    </div>
                    <h5 class="card-title">Health Education</h5>
                    <p class="card-text text-muted">Learn about diseases, prevention, and healthy living with trusted resources.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="display-4 text-warning mb-3">
                        <i class="bi bi-bell-fill"></i>
                    </div>
                    <h5 class="card-title">Health Alerts</h5>
                    <p class="card-text text-muted">Stay informed about public health announcements when it matters most.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="display-4 text-primary mb-3">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="card-title">Community Awareness</h5>
                    <p class="card-text text-muted">Empower communities through access to health information and support.</p>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Latest Articles -->

<div class="container">

    <h2 class="section-title">Latest Health Articles</h2>

    <div class="row">

        <?php

        $articles = mysqli_query(
            $conn,
            "SELECT * FROM articles ORDER BY id DESC LIMIT 3"
        );

        while($row = mysqli_fetch_assoc($articles)){
        ?>

        <div class="col-md-4">

            <div class="card mb-4 shadow">

                <div class="card-body">

                    <h5><?php echo $row['title']; ?></h5>

                    <p>
                        <?php echo substr($row['content'],0,120); ?>...
                    </p>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

<!-- Footer -->

<footer class="bg-dark text-white text-center p-4 mt-5">

    <p>
        Digital Health Awareness System © 2026
    </p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>