<?php
namespace Models;

use PDO;

class Book {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM books");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $author) {
        $stmt = $this->db->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
        return $stmt->execute([$title, $author]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id=?");
        return $stmt->execute([$id]);
    }
}