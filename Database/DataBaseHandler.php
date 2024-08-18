<?php

class DataBaseHandler
{
    private string $host = '127.0.0.1';
    private string $username = 'root';
    private string $password = '';
    private string $dbname = 'shop';
    private int $port = 3307;
    private $pdo;
    private $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function statement($query, $params = [])
    {
        $this->stmt = $this->pdo->prepare($query);
        $this->stmt->execute($params);
        return $this->stmt;
    }

    public function close()
    {
        $this->stmt = null;
        $this->pdo = null;
    }
}