<?php
include("../Util/connectDB.php");
include("../Model/User.class.php");
session_start();
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function HashPass($String)
{
    $value = password_hash($String, PASSWORD_BCRYPT);
    return $value;
}

//Register 
if (isset($_REQUEST['submitR'])) {
    $User = new Users;
    $Email = $_POST['EmailS'];
    $Name = explode("@", $Email)[0];
    $Pass = $_POST['PasswordS'] . trim(' ');
    $RePass = $_POST['RePasswordS'];
    $Phone = $_POST['PhoneS'];
    $Date = date("Y/m/d");
    $HashPass = HashPass($Pass);
    $CheckUser = $User->selectUser($Email);
    if ($CheckUser == false) {
        if ($Email != "" && $Pass != "" && validateEmail($Email)) {
            if ($Pass == $RePass) {
                $data = $User->createUser($Name, $Email, $HashPass, $Phone, $Date);
                $_SESSION['user'] = $data[0]["User_id"];
                header(`Location: ../view/index.php?page=home`);
            } else {
                echo "echo <script>alert('Password not macth')</script>";
                // header("Location: ../view/Login.php");
            }
        } else {
            echo "echo <script>alert('Email or password empty')</script>";
            // header("Location: ../view/Login.php");
        }
    } else {
        echo "echo <script>alert('Email is already')</script>";
        // header("Location: ../view/Login.php");
    }
}

//Login
if (isset($_REQUEST['submitL'])) {
    $Email = $_POST['EmailL'];
    $Pass = $_POST['PasswordL'] . trim(' ');
    $HashPass = HashPass($Pass);
    if (validateEmail($Email)) {
        $User = new Users();
        $FindUser = $User->selectUser($Email);
        if (password_verify($Pass, $FindUser[0]['Password'])) {
            $_SESSION['user'] = $FindUser[0]["User_id"];
            header("Location: ../view/index.php?page=home");
        } else if ($Email == "admin@gmail.com" && $Pass == 1234) {
            header("Location: ../view/Admin.php?data=product");

        } else {

            header("Location: ../view/Login.php");
        }
    } else {
        header("Location:../View/Login.php");

    }
}
