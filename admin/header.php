<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ebook</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Owl-carousel CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font-awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Animate CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css">


    <?php

    // require config file
    include('./config/constants.php');
    // require login-check
    include('login-check.php');
    ?>
</head>
<body>
<!-- Start #header -->
<header id='header'>
    <div class="strip d-flex flex-row-reverse px-4 py-1 bg-light">
        <div class="font-rale font-size-14 ">
            <a href="logout.php" class="px-3 border-right border-left text-dark">Log-out</a>

        </div>
    </div>


    <!-- Primary  Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Ebook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_admin.php">Admin </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_user.php">User </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="manage_book.php">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_order.php">Order</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>


</header>
<!-- End #header -->
<!-- Start #main -->
<main id="main-site">

