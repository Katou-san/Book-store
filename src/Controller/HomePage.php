<?php
include_once "../Model/Category.class.php";
include_once "../Model/Product.class.php";
include_once "../Model/User.class.php";

$Category = new Category();
$Product = new Product();
$idCate = $Category->selectCategory();
$row = 0;
while ($row < count($idCate)) {
    $_SESSION[$idCate[$row]['Category_id']] = array();
    $row++;
}

$DataPro = $Product->selectProduct();
$iP = 0;

while ($iP <= count($DataPro) - 1) {
    array_push($_SESSION[$DataPro[$iP]['Category_id']], $DataPro[$iP]);
    $iP++;
}


$ProSlider = $Product->getProuctLimit();
$_SESSION["slider"] = $ProSlider;


// ?>