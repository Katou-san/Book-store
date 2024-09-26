<?php
include_once("../Model/DB.class.php");

class Category extends DB
{
    public function CreateCategory($Name)
    {
        $sql = "INSERT INTO category(Name_category) VALUES(?)";
        $arr = array($Name);
        return $this->insert($sql, $arr);
    }
    public function selectCategory($id = "")
    {
        $arr = array();
        // if ($id == "") {
        $sql = "SELECT * FROM category";
        // } else {
        //     $sql = "SELECT * FROM category WHERE id =?";
        //     $arr = array($id);
        // }
        return $this->select($sql, $arr);
    }
    public function deleteCategory($Id)
    {
        $sql = "DELETE FROM category WHERE Category_id  =?";
        $arr = array($Id);
        return $this->delete($sql, $arr);
    }
    public function updateCategory($Name, $Id)
    {
        $sql = "UPDATE category SET Name_category =? WHERE Category_id =?";
        $arr = array($Name, $Id);
        return $this->update($sql, $arr);
    }

    public function checkCategory($name)
    {

        // if ($id == "") {
        $sql = "SELECT * FROM category WHERE Name_category =?";
        $arr = array($name);
        return $this->select($sql, $arr);
    }

}
?>