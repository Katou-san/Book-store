<?php
session_start();
include_once "../Controller/MainController.php";
// include_once "../Controller/DetailPage.php";
include_once "../include/detailItem.php";
include_once "../include/notificatiom.php";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="../css/detail.css" />
  <link rel="stylesheet" href="../css/notification.css">

</head>


<body>
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
      <a href="../View/index.php?page=home" class="logo"> <i class="fas fa-book"></i> bookly
      </a>

      <form action="" class="search-form">
        <input type="search" name="" placeholder="search here..." id="search-box" />
        <label for="search-box" class="fas fa-search"></label>
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
        <a href="#reviews">reviews</a>
        <a href="#blogs">blogs</a>
      </nav>
    </div>

    <?php
    if (isset($_SESSION["notificationU"])) {
      notification($_SESSION["notificationU"][0], $_SESSION["notificationU"][1], $_SESSION["notificationU"][2]);
      unset($_SESSION["notificationU"]);
    }
    ?>
  </header>
  <?php
  detailItem($_SESSION["dataDetail"]);
  ?>

</body>
<script src="../js/notification.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

  function showN() {
    toast = document.querySelector(".toast");
    let progress = document.querySelector(".progress");
    let BeforePro = document.querySelector(".progress", "::before");
    let check = document.querySelector(".check");
    let color = document.querySelector(".colortext").textContent;
    toast.classList.add("active");
    progress.classList.add("active");
    check.style.backgroundColor = color;
    BeforePro.style.backgroundColor = color;
    timer1 = setTimeout(() => {
      toast.classList.remove("active");
    }, 3000); //1s = 1000 milliseconds

    timer2 = setTimeout(() => {
      progress.classList.remove("active");
    }, 3000);
  }

  function setMessenger(color, title, message) {
    document.querySelector(".colortext").innerHTML = color
    document.querySelector(".text-1").innerHTML = title
    document.querySelector(".text-2").innerHTML = message
  }

  function AddCart(masach) {
    var check = document.querySelector("#check").value

    if (check == 1) {
      $.ajax({
        type: "GET",
        url: "../Controller/CartHandle.php?IdBook=" + masach,
        success: function (kq) {
          let count = document.querySelector(".countCart")
          count.innerHTML = Number(count.textContent.trim()) + 1
          setMessenger("green", "success", " Đã thêm sách ")
          showN()
        }
      });
    } else {
      setMessenger("red", "Failed", "Cần phải đăng nhập")
      showN()
    }
  }
</script>

</html>