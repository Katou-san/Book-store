<?php
// include "../Util/connectDB.php";
include_once "../Model/Category.class.php";
include_once "../Model/Product.class.php";
include_once "../Model/User.class.php";
session_start();
//REMOVE 


if (isset($_POST['btnSubmitDeleteU'])) {
    $IdUser = $_POST['IdUser'];
    $Email = $_POST['EmailUser'];
    $User = new Users();
    $check = $User->deleteUser($IdUser, $Email);
    if ($check > 0) {
        $_SESSION["notifications"] = ["green", "Success", "Delete User successfully"];
        header("Location:../View/Admin.php?data=user");
    } else {
        $_SESSION["notifications"] = ["red", "Failed", "Delete User failed"];
        header("Location:../View/Admin.php?data=user");
    }
}
//Add Category
if (isset($_POST['btnSubmitAddC'])) {
    $NameCategory = $_POST['CategoryName'];
    if ($NameCategory != "") {

        $Category = new Category();
        $temp = $Category->checkCategory($NameCategory);
        if ($temp == null) {
            $check = $Category->CreateCategory($NameCategory);
            if ($check > 0) {
                $_SESSION["notifications"] = ["green", "Success", "add category successfully"];
                header("Location:../View/Admin.php?data=category");
            } else {
                $_SESSION["notifications"] = ["red", "Failed", "add category failed"];
                header("Location:../View/Admin.php?data=category");
            }
        } else {
            $_SESSION["notifications"] = ["red", "Failed", "trung ten the loai"];
            header("Location:../View/Admin.php?data=category");
        }

    } else {
        $_SESSION["notifications"] = ["red", "Failed", "add category failed"];
        header("Location:../View/Admin.php?data=category");
    }
}

//Edit Category
if (isset($_POST['btnSubmitEditC'])) {
    $Category = new Category();
    $Id = $_POST['IECategoryId'];
    $NameCategory = $_POST['IECategoryName'];
    if ($NameCategory != "") {
        $check = $Category->updateCategory($NameCategory, $Id);
        var_dump($check);
        if ($check > 0) {
            $_SESSION["notifications"] = ["green", "Success", "Update category successfully"];
            header("Location:../View/Admin.php?data=category");
        }
    } else {
        $_SESSION["notifications"] = ["red", "Failed", "Update category failed"];
        header("Location:../View/Admin.php?data=category");
    }
}

//Delete category
if (isset($_POST['btnSubmitDeleteC'])) {
    $Category = new Category();
    $Id = $_POST['IDCategoryId'];
    $check = $Category->deleteCategory($Id);
    if ($check > 0) {
        $_SESSION["notifications"] = ["green", "Success", "Delete category successfully"];
        header("Location:../View/Admin.php?data=category");
    } else {
        $_SESSION["notifications"] = ["red", "Failed", "Delete category failed"];
        header("Location:../View/Admin.php?data=category");
    }
}

//----------------------------------------------------------------
//Add Product
if (isset($_POST["btnSubmitAddP"])) {
    echo "hello";
    $error = 0;
    $Product = new Product();
    $dirFile = "../Upload";
    $IdP = $_POST["IIdProductA"] . getdate()[0];
    $Name = $_POST["INameProductA"];
    $IdCategory = (int) $_POST["CategoryPid"];
    $Date = getdate();
    $fileUpload = $_FILES["IImgProductA"];
    $NameFile = "";
    $Price = (double) $_POST["IPriceProductA"];
    $Publishing = $_POST["IPublishingProductA"];
    $Author = $_POST["IAuthorProductA"];
    $SoldOut = 0;
    $description = $_POST["IDescriptionP"];
    if (isset($_FILES["IImgProductA"])) {
        $getName = explode(" ", $Name)[0];
        $getTypeFile = explode("/", $_FILES["IImgProductA"]["type"]);
        $NameFile = $IdP . '@' . $getName . '@' . $Date[0] . '.' . $getTypeFile[1];
        $name = basename($NameFile);

    } else {
        $error++;
    }

    if ($Name !== "" && $IdP !== "") {
        if ($error == 0) {
            // $checkName = $Product->checkProductName($Name);

            $check = $Product->createProduct($IdP, $Name, $NameFile, $Price, $Date[0], $IdCategory, $description, $Publishing, $Author, $SoldOut);
            move_uploaded_file($_FILES['IImgProductA']['tmp_name'], "$dirFile/$name");
            if ($check > 0) {
                $_SESSION["notifications"] = ["green", "Success", "Add Product successfully"];
                header("Location:../View/Admin.php?data=product");
            } else {
                $_SESSION["notifications"] = ["red", "Failed", "Add Product Failed"];
                header("Location:../View/Admin.php?data=product");
            }
        } else {
            $_SESSION["notifications"] = ["red", "Failed", "File not type image"];
            header("Location:../View/Admin.php?data=product");
        }
    } else {
        $_SESSION["notifications"] = ["red", "Failed", "Name and ID is null or empty"];
        header("Location:../View/Admin.php?data=product");
    }
}
//Edit Product

if (isset($_POST["btnSubmitEditP"])) {
    $error = 0;
    $Product = new Product();
    $dirFile = "../Upload";
    $IdP = $_POST["IdEditP"];
    $Name = $_POST["NameEditP"];
    $IdCategory = (int) $_POST["CategoryEid"];
    $Date = getdate();
    $fileUpload = $_FILES["ImgEditP"];
    $NameFile = "";
    $Price = (double) $_POST["PriceEditP"];
    $Publishing = $_POST["AuthorEditP"];
    $Author = $_POST["AuthorEditP"];
    $SoldOut = 0;
    $description = $_POST["DescriptionEditP"];
    if (isset($_FILES["ImgEditP"])) {
        $getName = explode(" ", $Name)[0];
        $getTypeFile = explode("/", $_FILES["ImgEditP"]["type"]);
        $NameFile = $IdP . '@' . $getName . '@' . $Date[0] . '.' . $getTypeFile[1];
        $name = basename($NameFile);

    } else {
        $error++;
    }

    if ($Name !== "") {
        if ($error == 0) {
            $check = $Product->updateProduct($Name, $NameFile, $Price, $Date[0], $IdCategory, $description, $Publishing, $Author, $SoldOut, $IdP);
            move_uploaded_file($_FILES['ImgEditP']['tmp_name'], "$dirFile/$name");
            if ($check > 0) {
                $_SESSION["notifications"] = ["green", "Success", "Update Product successfully"];
                header("Location:../View/Admin.php?data=product");
            } else {
                $_SESSION["notifications"] = ["red", "Failed", "Add Product Failed"];
                header("Location:../View/Admin.php?data=product");
            }
        } else {
            $_SESSION["notifications"] = ["red", "Failed", "File not type image"];
            header("Location:../View/Admin.php?data=product");
        }
    } else {
        $_SESSION["notifications"] = ["red", "Failed", "Name and ID is null or empty"];
        header("Location:../View/Admin.php?data=product");
    }
}


//Delete Product
if (isset($_POST['btnSubmitDeleteP'])) {
    $Id = $_POST['IdDeleteP'];
    $Product = new Product();
    $check = $Product->deleteProduct($Id);
    if ($check > 0) {
        $_SESSION["notifications"] = ["green", "Success", "Add Product successfully"];
        header("Location:../View/Admin.php?data=product");
    } else {
        $_SESSION["notifications"] = ["red", "Failed", "Remove Product successfully"];
        header("Location:../View/Admin.php?data=product");
    }
}

if (isset($_POST["btnSearchA"])) {
    $inputS = $_POST["InputSearch"];
    $Cate = $_POST["select"];
    $Product = new Product();
    if ($Cate == '0') {
        if (isset($_SESSION['findProduct'])) {
            unset($_SESSION['findProduct']);
        }

        if ($inputS != "") {
            $data = $Product->findProductName($inputS);
            $_SESSION['findProduct'] = $data;
        }

        header("Location:../View/Admin.php?data=product");
    } else {
        if ($inputS != "") {
            $data = $Product->findPCateName($inputS, $Cate);
            $_SESSION['findProduct'] = $data;
        } else {
            $data = $Product->getProuctCate($Cate);
            $_SESSION['findProduct'] = $data;
        }
        header("Location:../View/Admin.php?data=product");

    }
}
?>