<!Doctype html>
<html lang="en">
<head>
    <title>E-commerce Application</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale= 1, user-scalable= no">

    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <!--Bootstrap CSS Package-->
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <?php
        // require functions.php file
        require ('functions.php');
        if(isset($_SESSION["user_id"])){
            $sessionUserId= $_SESSION["user_id"];
        }
        $userId= isset($_GET['user_id']) ? $_GET['user_id'] : $sessionUserId;
        $user= $user->getDataById($userId);
    ?>
</head>
<body style="background: url('./assets/images/bg.jpg')">
        <!-- start #header -->
        <header id="header">
            <?php
                if (isset($userId)){
                    //check if the logged in user is the admin
                    if ($userId === '1'){
            ?>
                <!-- Admin Area -->
                <div id="admin-field" class="bg-dark text-white px-5 py-2 d-flex justify-content-between">
                    <span><span class="px-2"><i class="fas fa-user"></i></span>Welcome Francis</span>
                    <a href="#" class="text-decoration-none text-white"><button class="btn btn-info py-0">update site</button></a>
                </div>
            <?php
                    }
                }
            ?>
            <!-- Admin Area -->
            <!--
            <div id="admin-field" class="bg-dark text-white px-5 py-2 <?php //echo (true ? 'd-flex' : 'd-none'); ?> justify-content-between">
                <span><span class="px-2"><i class="fas fa-user"></i></span>Welcome Francis</span>
                <a href="#" class="text-decoration-none text-white"><button class="btn btn-info py-0">update site</button></a>
            </div>
           -->
            <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
                <p class="font-rale font-size-12 text-black-50 m-0"> Welcome <?php echo $user['first_name'] ?? 'user'?></p>
                <div class="font-rale font-size-14">
                    <a href="login.php" class="px-3 border-right border-left text-dark">Logout</a>
                    <a href="wishlist.php" class="px-3 border-right text-dark">Wishlist (<?php echo count($product->getData('wishlist')); ?>)</a>
                </div>
            </div>

            <div style="position:relative">
            <!-- Primary Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-theme-color">
                <a class="navbar-brand" href="index.php" style="margin-top:-10px;"><img src="./assets/images/pgh logo.svg" alt="" style="width:100px;height:50px;object-fit:cover"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="margin-left:80%">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">On Sale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?php printf('%s?user_id=%s',"products-list.php", $userId ?? 0); ?>>Products <i class="fas fa-chevron-down"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Coming Soon</a>
                        </li>
                    </ul>
                    <form action="#" class="font-bodyText">
                        <a href="cart.php" class="rounded-pill bg-dark py-1">

                            <span class="px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                            <span class="px-3 py-1 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>

                        </a>
                    </form>
                </div>
            </nav>
            <!-- !Primary Navigation -->
            </div>
        </header>
        <!-- !end #header -->

        <!-- start #main-site -->
        <main id="main-site">