<?php
include_once "../Model/Category.class.php";
include_once "../Model/Product.class.php";
session_start();
$IdProduct = $_GET["idD"];
var_dump($IdProduct);
$Product = new Product();
$DataDetail = $Product->selectProductID($IdProduct);
$_SESSION["dataDetail"] = $DataDetail[0];
var_dump($_SESSION["dataDetail"]);
header("location:../View/Detail.php");
?>