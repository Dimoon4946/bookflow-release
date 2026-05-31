<?php
namespace Models;

use PDO;

class Order {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query("
            SELECT orders.*, users.name 
            FROM orders
            JOIN users ON orders.user_id = users.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}