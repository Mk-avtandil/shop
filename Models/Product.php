<?php
class Product {
    public ?int $id = null;
    private string $name;
    private int $price;
    private string $description;
    private int $category_id;
    public function __construct(private DatabaseHandler $db, $name, $price, $description, $category_id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category_id = $category_id;
    }
    public static function getAllProducts($db): array
    {
        $stmt = $db->statement("SELECT * FROM products");
        return $stmt->fetchAll();
    }
}
