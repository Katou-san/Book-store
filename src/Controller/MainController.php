<?php
include_once "../Model/Category.class.php";
include_once "../Model/Product.class.php";
include_once "../Model/User.class.php";
if (isset($_GET["page"])) {
    if ($_GET["page"] == "home") {
        include_once(__DIR__ . "/HomePage.php");
    }

    if ($_GET["page"] == "detail" && isset($_GET["idD"])) {
        include_once(__DIR__ . "/DetailPage.php");
    }

    if ($_GET["page"] == "result") {
        include_once(__DIR__ . "/ResultPage.php");
    }
}

?>