<?php

class DataBaseHandler
{
    private string $host = '127.0.0.1';
    private string $username = 'root';
    private string $password = '';
    private string $dbname = 'shop';
    private int $port = 3307;
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:' . 'host=' . $this->host . ';dbname=' . $this->dbname .
                ';port=' . $this->port, $this->username, $this->password);
        } catch (Exception $ex) {
            echo $ex->getMessage() . PHP_EOL;
        }
        return $this->conn;
    }

    public function query(string $sql) : PdoStatement
    {
        return $this->conn->query($sql);
    }
}