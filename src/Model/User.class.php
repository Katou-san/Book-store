<?php
include_once("../Model/DB.class.php");
class Users extends DB
{
    public function createUser($Name, $Email, $Password, $NumbePhone, $Date)
    {
        $sql = "INSERT INTO user(Name_user,Email,Password,NumberPhone,Date) VALUES(?,?,?,?,?)";
        $arr = array(
            $Name,
            $Email,
            $Password,
            $NumbePhone,
            $Date
        );
        return $this->insert($sql, $arr);
    }

    public function selectUser($Email = "")
    {
        $arr = array();
        if ($Email == "") {
            $sql = "SELECT * FROM user";
        } else {
            $sql = "SELECT * FROM user WHERE Email =?";
            $arr = array($Email);
        }

        return $this->select($sql, $arr);
    }

    public function deleteUser($id, $Email)
    {
        $sql = "DELETE FROM user WHERE User_id=? AND Email =?";
        $arr = array($id, $Email);
        return $this->delete($sql, $arr);
    }

    public function updateUser($Name, $Email, $Password, $NumbePhone, $Date)
    {
        $sql = "UPDATE user SET Name_user =?,Password =?,NumberPhone =?,Date =? WHERE Email =?";
        $arr = array($Name, $Password, $NumbePhone, $Date, $Email);
        return $this->update($sql, $arr);
    }



}
?>