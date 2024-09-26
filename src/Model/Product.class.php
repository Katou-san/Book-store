<?php
include_once("../Model/Product.class.php");
class Product extends DB
{
    public function createProduct($Id, $NameBook, $Img, $Price, $Date, $idCategory, $description, $Publishing, $Author, $SoldOut)
    {
        $sql = "INSERT INTO product VALUES(?,?,?,?,?,?,?,?,?,?)";
        $arr = array($Id, $NameBook, $Date, $Img, $Price, $idCategory, $description, $Publishing, $Author, $SoldOut);
        return $this->insert($sql, $arr);
    }

    public function selectProductID($id = "")
    {
        $sql = "SELECT * FROM product WHERE Product_id = ?";
        $arr = array($id);
        return $this->select($sql, $arr);
    }

    public function selectProduct()
    {
        $sql = "SELECT * FROM product";
        return $this->select($sql);
    }


    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE Product_id =?";
        $arr = array($id);
        return $this->delete($sql, $arr);
    }

    public function updateProduct($NameBook, $Img, $Price, $Date, $idCategory, $description, $Publishing, $Author, $SoldOut, $id)
    {
        $sql = "UPDATE product SET Name_book =?,Img =?,Price =?,Date =?,Category_id =?,Description =?,Publishing=?,Author=?,SoldOut=? WHERE Product_id =?";
        $arr = array($NameBook, $Img, $Price, $Date, $idCategory, $description, $Publishing, $Author, $SoldOut, $id);
        return $this->update($sql, $arr);
    }

    public function getProuctLimit()
    {
        $sql = "SELECT * from product ORDER by rand() LIMIT 5";
        return $this->select($sql);
    }

    public function getProuctCate($idcate)
    {
        $sql = "SELECT p.Product_id,p.Name_book,p.Date,p.Img,p.Price,p.Category_id,p.Description,p.Publishing,p.Author,p.SoldOut FROM product as p JOIN category as c ON c.Category_id = p.Category_id  WHERE p.Category_id = ?";
        $arr = array($idcate);
        return $this->select($sql, $arr);
    }

    public function findProductName($Name)
    {
        $data = "%" . $Name . "%";
        $sql = "SELECT * FROM product WHERE Name_book LIKE ?";
        $arr = array($data);
        return $this->select($sql, $arr);
    }

    public function findPCateName($Name, $idcate)
    {
        $data = "%" . $Name . "%";
        $sql = "SELECT * FROM product WHERE Category_id =? AND Name_book LIKE ?";
        $arr = array($idcate, $data);
        return $this->select($sql, $arr);
    }

    public function checkProductName($Name)
    {
        $data = $Name;
        $sql = "SELECT * FROM product WHERE Name_book LIKE ?";
        $arr = array($data);
        return $this->select($sql, $arr);
    }
}


?>