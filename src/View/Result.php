<?php
include_once("../include/Item.php");
include_once("../Controller/ResultPage.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="../css/Result.css">
    <title>Document</title>
</head>
<header class="header">
    <div class="header-1">
        <a href="#" class="logo"> <i class="fas fa-book"></i> bookly </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box" />
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fa fa-heart"></a>
            <a href="#" class="fa fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>
    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#featured">featured</a>
            <a href="#arrivals">arrivals</a>
            <a href="#reviews">reviews</a>
            <a href="#blogs">blogs</a>
        </nav>
    </div>
</header>

<body>
    < <section class="arrivals ListLayout" id="arrivals">
        <h1 class="heading"><span>Result</span></h1>
        <div class="listItem">
            <?php

            if ($_SESSION["SearchValue"] != "NOT FOUND") {
                $key = 0;
                while ($key < count($_SESSION["SearchValue"])) {
                    Itemlist($_SESSION["SearchValue"][$key]);
                    $key++;
                }
            } else {
                echo "<h1>NOT FOUND</h1>";
            }

            ?>
        </div>
        </section>
</body>

</html>