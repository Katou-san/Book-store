<?php
include_once("../Model/Oder.class.php");
include_once("../Model/Product.class.php");
include_once("../Model/Oder_Detail.class.php");
session_start();

if (isset($_SESSION["user"])) {
    if (isset($_GET["IdBook"])) {
        $idBook = $_GET["IdBook"];
        if (isset($_SESSION["cartf"])) {
            foreach ($_SESSION["cartf"] as $key => $value) {
                if ($key == $idBook) {
                    $_SESSION["cartf"][$key] = $value + 1;
                } else {
                    $_SESSION["cartf"][$idBook] = 1;
                }
            }
        } else {
            $_SESSION["cartf"][$idBook] = 1;
        }
    }

    if (isset($_GET["idDBook"])) {
        $id = $_GET["idDBook"];
        unset($_SESSION["cartf"][$id]);
        header("location: ../View/Cart.php");
    }
} else {
    $_SESSION["notificationU"] = ["red", "Success", "you need Login "];
}

if (isset($_POST["submitCart"])) {
    $listCart = $_SESSION['cartf'];
    $idUser = $_SESSION['user'];
    $Name = $_POST["NameCO"];
    $Adress = $_POST["AdressCO"];
    $Phone = $_POST["PhoneCO"];
    $Total = $_POST["TotalCO"];
    $Date = date("Y/m/d");
    $Time = date("h:i:s");
    $AllKey = array_keys($listCart);
    $Id = rand(10, 99) . explode("/", $Date)[2] . explode(":", $Time)[0] . explode(":", $Time)[1] . explode(":", $Time)[2];
    if ($Name != "" && $Adress != "" && $Phone != "" && $Total != "") {
        $Order = new Order();
        $Product = new Product();
        $Order_Detail = new OrderDetail();
        $test = $Order->CreateOrder($Id, $Date, $Total, $idUser, $Adress, $Phone);
        $i = 0;
        while ($i < count($listCart)) {
            $Item = $Product->selectProductID($AllKey[$i]);
            if ($Item != Null) {
                $Order_Detail->CreateOrderDetail($AllKey[$i], $listCart[$AllKey[$i]], $Item[0]["Price"], $Id);
            }
            $i++;
        }
        $_SESSION["order"] = 1;
        unset($_SESSION['cartf']);
        header("location:../View/index.php?page=home");

    }

}



?>