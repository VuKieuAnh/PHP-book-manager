<?php
namespace Model;
use PDO;

class DBConnection
{
    public $dsn;
    public $user;
    public $password;

    public function __construct($dsn, $user, $password)
    {
        $this->dsn = $dsn;
        $this->password = $password;
        $this->user = $user;
    }

    public function connect(){
        $conn = null;
        try {
            $conn = new PDO($this->dsn, $this->user, $this->password);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $conn;
    }
}
