<?php
include_once("../Model/DB.class.php");

class Order extends DB
{
    public function CreateOrder($Order_Id, $Order_Date, $Order_Total, $User_id, $Adress, $Phone)
    {
        $sql = "INSERT INTO order_tbl(Order_Id,Oder_Date,Order_Total,User_id,Adress,Phone) VALUES(?,?,?,?,?,?)";
        $arr = array($Order_Id, $Order_Date, $Order_Total, $User_id, $Adress, $Phone);
        return $this->insert($sql, $arr);
    }
    public function selectOrder($id = "")
    {
        $arr = array();
        // if ($id == "") {
        $sql = "SELECT * FROM order_tbl";
        // } else {
        //     $sql = "SELECT * FROM category WHERE id =?";
        //     $arr = array($id);
        // }
        return $this->select($sql, $arr);
    }
    public function deleteOrder($Id)
    {
        $sql = "DELETE FROM order_tbl WHERE Order_Id  =?";
        $arr = array($Id);
        return $this->delete($sql, $arr);
    }
    // public function updateOrder($Name, $Id)
    // {
    //     $sql = "UPDATE order_tbl SET Name_category =? WHERE Category_id =?";
    //     $arr = array($Name, $Id);
    //     return $this->update($sql, $arr);
    // }

}
?>