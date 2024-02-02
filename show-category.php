<?php
session_start();

include "db_conn.php";

include "php/func-category.php";
$categories = get_all_categories($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - My BookFinder</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            background-color: #f8f9fa;
            background-image: url("uploads/cover/books-background.jpg");
        }

        .container {
            background-color: #ffffff;
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            background-color: #28a745;
            border-radius: 5px;
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 1.5rem;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #007bff;
            margin: 0 10px;
            font-size: 1.2rem;
        }

        h4 {
            color: #5F9EA0;
        }

        .link-dark {
            color: #007bff;
        }
        h2{
            color: #5F9EA0;
        }

        .link-dark:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="home-page.php">My BookFinder</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">BookFinder</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="show-category.php">Genres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="show-author.php">Authors</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item" style="margin-left: 580px;">
                            <?php if (isset($_SESSION['user_id'])) {?>
                                <a class="nav-link" href="admin.php">Admin</a>
                            <?php }else{ ?>
                                <a class="nav-link" href="login.php">Login</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="mt-4">
            <h2>Genres</h2>
            <h5>With one click explore our collection of book genres.</h5>

            <div class="list-group">
                <?php foreach ($categories as $category): ?>
                    <a href="category.php?id=<?= $category['id'] ?>" class="list-group-item list-group-item-action">
                        <?= $category['name'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
