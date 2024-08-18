<?php
class Category {
    public ?int $id = null;
    public function __construct(private DatabaseHandler $db, public string $name) {}
    public function getName(): string
    {
        return $this->name;
    }
    public function save(): void
    {
        if ($this->id) {
            $sql = "UPDATE categories SET name = :name WHERE id = :id";
            $params = [
                ':name' => $this->name,
                ':id' => $this->id
            ];
        } else {
            $sql = "INSERT INTO categories (name) VALUES (:name)";
            $params = [':name' => $this->name, ];
        }

        $this->db->statement($sql, $params);

        if (!$this->id) {
            $this->id = $this->db->statement("SELECT LAST_INSERT_ID()")->fetchColumn();
        } }
    public function delete(): void
    {
        if ($this->id) {
            $sql = "DELETE FROM categories WHERE id = :id";
            $params = [':id' => $this->id];
            $this->db->statement($sql, $params);
            $this->id = null; }
    }
    public function update($name): void
    {
        $this->name = $name;
        $this->save(); }

    public static function getAll($db): array
    {
        $stmt = $db->statement("SELECT * FROM categories");
        return $stmt->fetchAll();
    }
}
