<?php

session_start();


include_once "../Model/Category.class.php";
include_once "../Model/Product.class.php";
include_once "../Model/User.class.php";
include_once "../../src/include/Item.php";
include_once "../Controller/MainController.php";





if (isset($_SESSION['user'])) {
  echo "<input type='text' id='check' value=1>";
} else {
  echo "<input type='text' id='check' value=0>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Complete Responsive Online Boot Store Website Design Tutorial</title>

  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/notification.css">
</head>

<body>
  <!-- header section starts  -->
  <div class='toast toastIndex'>
    <div class='toast-content'>
      <i class='fas fa-solid fa-check check'></i>
      <div class='message'>
        <span class='colortext'></span>
        <span class='text text-1'></span>
        <span class='text text-2'></span>
      </div>
    </div>
    <i class='fa-solid fa-xmark close'></i>
    <div class='progress'></div>
  </div>
  <header class="header">
    <div class="header-1">
      <a href="../View/index.php?page=home" class="logo"> <i class="fas fa-book"></i> bookly </a>

      <form action="./Result.php?page=result" class="search-form" method="post">
        <input type="search" name="SearchValue" placeholder="search here..." id="search-box" />
        <button type="submit"> <label for="search-box" class="fas fa-search"></label></button>
      </form>

      <div class="icons">
        <div id="search-btn" class="fas fa-search"></div>
        <a href="#" class="fa fa-heart"></a>
        <a href="../View/Cart.php" id="cartIcon" class="fa fa-shopping-cart">
          <span class="countCart">
            <?php
            if (isset($_SESSION['cartf'])) {
              echo count($_SESSION['cartf']);
            } else {
              echo 0;
            }

            ?>
          </span>
        </a>

        <?php
        if (isset($_SESSION['user'])) {
          echo " <div id='login-btn' class='loginComple-btn fas fa-user'>";
          echo $_SESSION['user'];
          echo "<div class='OptionLogin'>
                    <ul>
                      <a href='../Controller/Logout.php'>
                        <li>Logout</li>
                      </a>
                    </ul>
                  </div>  </div>";
        } ?>

        <?php
        if (!isset($_SESSION['user'])) {
          echo "<a href='../View/Login.php'> <div id='login-btn' class='login-btn fas fa-user'> Login</div></a>";
        }
        ?>

      </div>
    </div>

    <div class="header-2">
      <nav class="navbar">
        <a href="../View/index.php?page=home">home</a>
        <a href="#featured">featured</a>
        <a href="#arrivals">arrivals</a>
      </nav>
    </div>


  </header>

  </div>


  <nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fas fa-blog"></a>
  </nav>

  <!-- login form  -->

  <!-- home section starts  -->
  <div class="mainbody">
    <section class="home" id="home">
      <div id="Next"><i class="fas fa-arrow-right"></i></div>
      <div id="Prev"><i class="fas fa-arrow-left"></i></div>
      <div class="slider">

        <?php
        $i = 0;
        while ($i < count($_SESSION["slider"])) {
          ItemSlider($_SESSION["slider"][$i]);
          $i++;
        }
        ?>

      </div>
    </section>

    <!-- home section ense  -->

    <!-- icons section starts  -->



    <!-- icons section ends -->

    <!-- featured section starts  -->

    <section class="featured" id="featured">
      <h1 class="heading"><span>featured books</span></h1>

      <div class="swiper featured-slider">
        <div class="swiper-wrapper">
          <?php
          $Product = new Product();
          $DataPro = $Product->selectProduct();
          $i = 0;
          // var_dump($DataPro);
          while ($i < count($DataPro)) {
            ItemBig($DataPro[$i]);
            $i++;
          }
          ?>;
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>

    <!-- featured section ends -->

    <!-- arrivals section starts  -->

    <section class="arrivals" id="arrivals">
      <h1 class="heading"><span>new arrivals</span></h1>
      <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
          <?php

          $getData = $Product->selectProduct();
          $i = 0;
          while ($i < count($getData)) {
            Item($getData[$i]);
            $i++;
          }

          ?>
        </div>
      </div>
    </section>
    <section class="arrivals ListLayout" id="arrivals">
      <h1 class="heading"><span>Manga</span></h1>
      <div class="listItem">
        <?php
        $mangaI = 0;
        while ($mangaI < count($_SESSION[21])) {
          Itemlist($_SESSION[21][$mangaI]);
          $mangaI++;
        }

        ?>
      </div>
    </section>

    <section class="arrivals ListLayout" id="arrivals">
      <h1 class="heading"><span>light Novel</span></h1>
      <div class="listItem">
        <?php
        $mangaI = 0;
        while ($mangaI < count($_SESSION[22])) {
          Itemlist($_SESSION[22][$mangaI]);
          $mangaI++;
        }

        ?>
      </div>
    </section>

    <section class="arrivals ListLayout" id="arrivals">
      <h1 class="heading"><span>Tâm lý học</span></h1>
      <div class="listItem">
        <?php
        $mangaI = 0;
        while ($mangaI < count($_SESSION[23])) {
          Itemlist($_SESSION[23][$mangaI]);
          $mangaI++;
        }

        ?>
      </div>
    </section>


    <section class="arrivals ListLayout" id="arrivals">
      <h1 class="heading"><span>Giáo dục</span></h1>
      <div class="listItem">
        <?php
        $mangaI = 0;
        while ($mangaI < count($_SESSION[24])) {
          Itemlist($_SESSION[24][$mangaI]);
          $mangaI++;
        }
        ?>
      </div>
    </section>

    <section class="arrivals ListLayout" id="arrivals">
      <h1 class="heading"><span>other</span></h1>
      <div class="listItem">
        <?php
        $mangaI = 0;
        while ($mangaI < count($_SESSION[24])) {
          Itemlist($_SESSION[24][$mangaI]);
          $mangaI++;
        }
        ?>
      </div>
    </section>




    <!-- footer section starts  -->

    <section class="footer">
      <div class="box-container">
        <div class="box">
          <h3>our locations</h3>
          <a href="#"> <i class="fas fa-map-marker-alt"></i> indonesia </a>
          <a href="#"> <i class="fas fa-map-marker-alt"></i> USA </a>
          <a href="#"> <i class="fas fa-map-marker-alt"></i> russia </a>
          <a href="#"> <i class="fas fa-map-marker-alt"></i> france </a>
          <a href="#"> <i class="fas fa-map-marker-alt"></i> japan </a>
          <a href="#"> <i class="fas fa-map-marker-alt"></i> africa </a>
        </div>

        <div class="box">
          <h3>quick links</h3>
          <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> arrivals </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> reviews </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> blogs </a>
        </div>

        <div class="box">
          <h3>extra links</h3>
          <a href="#"> <i class="fas fa-arrow-right"></i> account info </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> ordered items </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> privacy policy </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> payment method </a>
          <a href="#"> <i class="fas fa-arrow-right"></i> our serivces </a>
        </div>

        <div class="box">
          <h3>contact info</h3>
          <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
          <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
          <a href="#">
            <i class="fas fa-envelope"></i> hellofreewebsitecode@gmail.com
          </a>
          <img src="../assets/worldmap.png" class="map" alt="" />
        </div>
      </div>

      <div class="share">
        <a href="https://facebook.com/freewebsitecode/" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
      </div>

      <div class="credit">
        created by
        <span>Free Website Code</span>
        | all rights reserved!
      </div>
    </section>
  </div>




  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../js/script.js"></script>
  <script src="../js/homePage.js"></script>
  <script src="../js/NoitiIndex.js"></script>
  <?php
  if (isset($_SESSION["order"])) { ?>
    <script>
      setMessenger("green", "success", "than toan thanh cong")
    </script>
    <?php
    unset($_SESSION["order"]);
  }
  ?>
</body>

</html>