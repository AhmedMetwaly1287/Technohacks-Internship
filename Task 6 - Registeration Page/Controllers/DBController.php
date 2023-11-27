<?php
//Created using Singleton Method!
class DBController
{
    private static $instance = null;
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "internship";
    public $connection;
    public $errMsg;


    private function __construct()
    {
        // private constructor to prevent instantiation from outside
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DBController();
        }
        return self::$instance;
    }
    public function OpenCon()
    {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if ($this->connection->connect_error) {
            $errMsg = 'Error in Connection: ' . $this->connection->connect_error;
            return false;
        } else {
            return true;
        }
    }
    public function CloseCon()
    {
        if ($this->connection) {
            //    $errMsg = 'Connection has been closed';
            $this->connection->close();
        } else {
            $errMsg = 'Connection not established';
        }
    }
    public function Insert($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            $errMsg = "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return $this->connection->insert_id; // for auto-incremented fields (PK)
        }

    }
    public function Select($qry)
    {
        $result = $this->connection->query($qry); //result is the query statement sent by the user (usually the qry is the query statement string, result is for internal use)
        if (!$result) {
            $errMsg = "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC); //returns all rows associated with the statement sent
        }
    }


    public function Update($qry)
    {
        $result = $this->connection->query($qry); //result is the query statement sent by the user (usually the qry is the query statement string, result is for internal use)
        if (!$result) {
            $errMsg = "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return true; //returns all rows associated with the statement sent
        }
    }
    public function Drop($qry)
    {
        $result = $this->connection->query($qry); //result is the query statement sent by the user (usually the qry is the query statement string, result is for internal use)
        if (!$result) {
            $errMsg = "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return true; //returns all rows associated with the statement sent
        }
    }
}
?>