<?php
namespace Models;

use PDO;

class Issue {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query("
            SELECT issues.*, orders.id as order_id
            FROM issues
            JOIN orders ON issues.order_id = orders.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}