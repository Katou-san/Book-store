<?php
class DB
{
    private $_numRow;
    private $pdo = null;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "databasephp";
    public function __construct()
    {
        $Driver = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname;
        try {

            $this->pdo = new PDO($Driver, $this->username, $this->password);
            $this->pdo->query("set names 'utf8' ");
        } catch (PDOException $e) {
            echo "connect failed: " . $e->getMessage();
            exit();
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
    public function getNumRow()
    {
        return $this->_numRow;
    }
    private function query($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
    {
        $stmt = $this->pdo->prepare($sql);
        if (!$stmt->execute($arr)) {
            echo "SQL loi";
            exit();
        }
        $this->_numRow = $stmt->rowCount();
        return $stmt->fetchAll($mode);
    }

    public function select($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
    {
        return $this->query($sql, $arr, $mode);
    }

    public function insert($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
    {
        $this->query($sql, $arr, $mode);
        return $this->getNumRow();

    }

    public function update($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
    {
        $this->query($sql, $arr, $mode);
        return $this->getNumRow();
    }

    public function delete($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
    {
        $this->query($sql, $arr, $mode);
        return $this->getNumRow();
    }

}


?>