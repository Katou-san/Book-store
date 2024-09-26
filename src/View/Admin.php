<?php
session_start();
include_once "../Model/Category.class.php";
include_once "../Model/Product.class.php";
include_once "../Model/User.class.php";
include_once "../include/table.php";
include("../include/notificatiom.php");

// ob_start();
$data = $_GET["data"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/Admin.css" />
  <link rel="stylesheet" href="../css/notification.css">
  <title>Admin Page</title>
</head>

<body>
  <div class="headerA">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form action="../Controller/AdminController.php" method="post">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <select class="form-select" aria-label="Default select example" name="select">
                  <option selected value="0">All</option>
                  <?php
                  $Cate = new Category();
                  $list = $Cate->selectCategory();
                  $i = 0;
                  while ($i < count($list)) {
                    echo "<option value='" . $list[$i]["Category_id"] . "'>" . $list[$i]["Name_category"] . "</option>";
                    $i++;
                  }
                  ?>
                </select>
              </li>


              <input class="form-control me-2 " type="search" placeholder="Search" name="InputSearch"
                aria-label="Search" />
              <button class="btn btn-outline-success" name="btnSearchA" type="submit">
                Search
              </button>
            </ul>
          </form>
          <a href="../Controller/LogoutA.php" class="btn btn-outline-primary">Logout</a>

        </div>
      </div>
    </nav>
    <?php
    // if (!isset($_SESSION["notifications"])) {
    //   $_SESSION["notifications"] = ["white", "", ""];
    // }
    // var_dump($_SESSION["notifications"]);
    
    if (isset($_SESSION["notifications"])) {
      // var_dump($_SESSION["notifications"]);
      notification($_SESSION["notifications"][0], $_SESSION["notifications"][1], $_SESSION["notifications"][2]);
      unset($_SESSION["notifications"]);
      ?>
    <?php }
    ?>

  </div>

  <nav class=" btnfrom navbar bg-body-tertiary ">
    <form class="container-fluid justify-content-end">
      <button onclick=" <?php if ($data == 'category') {
        echo 'toggleShowAddC()';
      } else if ($data == 'product') {
        echo 'toggleShowAddP()';
      } ?>" <?php if ($data == "user") {
         echo "disabled";
       } else {
         echo "";
       } ?> class="btn btn-outline-success me-2"
        type="button">
        Add
        <?php echo $data ?>
      </button>
    </form>
  </nav>
  <div class="bodyA">
    <div class="Bleft ">
      <ul class="nav nav-pills flex-column --bs-border-color">
        <li class="nav-item ">
          <a class="nav-link btnNav <?php if ($data == "user") {
            echo "active";
          } else {
            echo "";
          } ?>" aria-current='page' href='?data=user'>Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btnNav <?php if ($data == "category") {
            echo "active";
          } else {
            echo "";
          } ?>" href="?data=category">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btnNav <?php if ($data == "product") {
            echo "active";
          } else {
            echo "";
          } ?>" href="?data=product">Product</a>
        </li>

      </ul>
    </div>
    <div class="Bright">
      <table class="table">
        <thead>
          <tr>
            <?php title($data) ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $data = $_GET['data'];

          echo $data;
          switch ($data) {
            case "user":
              $User = new Users();
              $stmt = $User->selectUser();
              break;
            case "category":
              $Category = new Category();
              $stmt = $Category->selectCategory();
              break;
            case "product":
              $Product = new Product();
              if (isset($_SESSION['findProduct'])) {
                $stmt = $_SESSION['findProduct'];
              } else {
                $stmt = $Product->selectProduct();
              }


              break;
            default:
              break;
          }
          $row = $stmt;
          $i = 0;
          while ($i < count($row)) {
            if ($data == "user") {
              tableUser($row[$i]);
            }
            if ($data == "category") {
              tableCategory($row[$i], $data);
            }
            if ($data == "product") {
              tableProduct($row[$i]);
            }

            $i++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php
  include("../Layout/FromEditC.php");
  include("../Layout/FromAddC.php");
  include("../Layout/FromDeleteC.php");
  include("../Layout/FromAddP.php");
  include("../Layout/FromDeleteP.php");
  include("../Layout/FromEditP.php");
  include("../Layout/FromDeleteU.php");


  ?>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>
<script src="../js/AdminEvent.js"></script>
<script type="text/javascript" src="../js/notification.js">

</script>