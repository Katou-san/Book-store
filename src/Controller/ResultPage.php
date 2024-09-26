<?php
include_once "../Model/Category.class.php";
include_once "../Model/Product.class.php";
if (isset($_POST['SearchValue'])) {
    $Name = $_POST['SearchValue'];
    $Product = new Product();
    $listFinded = $Product->findProductName($Name);
    $_SESSION["SearchValue"] = "";
    if (count($listFinded) > 0) {
        $i = 0;

        $_SESSION["SearchValue"] = $listFinded;

    } else {
        $_SESSION["SearchValue"] = "NOT FOUND";
    }

}
?>