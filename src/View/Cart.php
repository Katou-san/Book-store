<?php
include_once("../Model/DB.class.php");
include_once("../Model/Product.class.php");
session_start();
function ItemTR($stt, $item, $number)
{
    echo "<tr class='TRItem'>";
    echo "<td>" . $stt . "</td>";
    echo "<td>";
    echo " <img src='../Upload/" . $item['Img'] . "' class='hinhdaidien'>";
    echo "</td>";
    echo "<td>" . $item['Name_book'] . "</td>";
    echo "<td class='text-right'>" . $number . "</td>";
    echo "<td class='text-right'>" . $item['Price'] . "</td>";
    echo "<td class='text-right total'>" . ($number * $item['Price']) . "</td>";
    echo "<td> <a id='delete_1' data-sp-ma='2' class='btn btn-danger btn-delete-sanpham' href='../Controller/CartHandle.php?idDBook=" . $item['Product_id'] . "'>
            <i class='fa fa-trash' aria-hidden='true'></i> Xóa
        </a>
    </td>
</tr>";

}


?>

<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nền tảng - Kiến thức cơ bản về WEB | Bảng tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../css/Cart.css" type="text/css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <!-- header -->
    <header class="header">
        <div class="header-1">
            <a href="../View/index.php?page=home" class="logo"> <i class="fas fa-book"></i> bookly </a>

            <form action="./Result.php?page=result" class="search-form" method="post">
                <input type="search" name="SearchValue" placeholder="search here..." id="search-box" />
                <button type="submit"> <label for="search-box" class="fas fa-search"></label></button>
            </form>

            <div class="icons">

                <a href="#" id="cartIcon" class="fa fa-shopping-cart">
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
    </header>
    <!-- end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <h1 class="text-center">Giỏ hàng</h1>
            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            <?php
                            if (isset($_SESSION['cartf'])) {
                                $listKey = array_keys($_SESSION['cartf']);
                                $listItemCart = $_SESSION['cartf'];
                                $Product = new Product();
                                $i = 0;
                                while ($i < count($listItemCart)) {
                                    $Item = $Product->selectProductID($listKey[$i]);
                                    if ($Item != Null) {
                                        ItemTR($i + 1, $Item[0], $listItemCart[$listKey[$i]]);
                                    }
                                    $i++;

                                }
                            } else {
                                echo "Cart is Emty";
                            }
                            ?>
                        </tbody>
                    </table>

                    <a href="../view/index.php?page=home" class=" btn btn-warning btn-md"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i>&nbsp;Quay
                        về trang chủ</a>
                    <button class="btn btn-primary btn-md " onclick={showPay()} <?php
                    if (isset($_SESSION['user'])) {
                        if (isset($_SESSION['cartf']) && count($_SESSION['cartf']) > 0) {
                            echo "";
                        } else {
                            echo "disabled";
                        }

                    } else
                        echo "disabled"; ?>>
                        <i class="fa fa-shopping-cart" aria-hidden="true">Thanh toán</i></button>
                </div>
            </div>
        </div>
        <!-- End block content -->
    </main>

    <!-- footer -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <script>document.write(new Date().getFullYear());</script>.
            <span class="text-muted">Hành trang tới Tương lai</span>
        </div>
    </footer>

    <div class="FormCheckout">
        <form action="../Controller/CartHandle.php" method="post">
            <h2>Thanh toan</h2>
            <div class="boxInput">
                <label for="">Username</label>
                <input type="text" name="NameCO" required>
            </div>
            <div class="boxInput">
                <label for="">Adress</label>
                <input type="text" name="AdressCO" required>
            </div>
            <div class="boxInput">
                <label for="">Phone</label>
                <input type="text" name="PhoneCO" required>
            </div>

            <div class="boxInput">
                <label for="">Total</label>
                <input type="text" class="IputTotal" disabled>
            </div>
            <div class="boxInput none">
                <label for="">Total</label>
                <input type="text" name="TotalCO" class="Totals">
            </div>

            <input type="submit" class="submitCart" name="submitCart" value="xac nhan">
        </form>

    </div>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popperjs/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script>
        let Listtxt = document.querySelectorAll(".total")
        let iput = document.querySelector(".IputTotal")
        let IputTotal = document.querySelector(".Totals")
        let total = 0
        Listtxt.forEach(element => {
            total = total + Number(element.textContent)
        });
        iput.value = total + "  vnd"
        IputTotal.value = total
        function showPay() {
            document.querySelector(".FormCheckout").classList.toggle("showCartPay")

        }
    </script>
</body>

</html>