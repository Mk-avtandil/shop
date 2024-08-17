<?php

require_once "DataBaseHandler.php";
class Product
{
    private string $title;
    private int $price;
    private int $count;
    private string $description;

    public function getName(): string
    {
        return $this->title;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public static function getAllProducts($db): array
    {
        $stmt = $db->query("SELECT * FROM products");
        return $stmt->fetchAll();
    }
}