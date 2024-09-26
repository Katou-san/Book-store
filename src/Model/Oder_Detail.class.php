<?php
include_once("../Model/DB.class.php");

class OrderDetail extends DB
{
    public function CreateOrderDetail($Product_id, $Product_Qty, $Product_Price, $Order_id)
    {
        $sql = "INSERT INTO order_details (Product_id,Product_Qty,Product_Price,Order_id) VALUES(?,?,?,?)";
        $arr = array($Product_id, $Product_Qty, $Product_Price, $Order_id);
        return $this->insert($sql, $arr);
    }
    public function selectOrder($id = "")
    {
        $arr = array();
        // if ($id == "") {
        $sql = "SELECT * FROM order_details";
        // } else {
        //     $sql = "SELECT * FROM category WHERE id =?";
        //     $arr = array($id);
        // }
        return $this->select($sql, $arr);
    }
    public function deleteOrder($Id)
    {
        $sql = "DELETE FROM order_details WHERE Order_Details_id  =?";
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