<?php
namespace Models;

use PDO;

class Report {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // 1. Книги
    public function booksReport() {

        $stmt = $this->db->query("
            SELECT 
                books.title,
                COUNT(orders.id) AS orders_count
            FROM books
            LEFT JOIN orders
                ON books.id = orders.book_id
            GROUP BY books.title
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Пользователи
    public function usersReport() {

        $stmt = $this->db->query("
            SELECT 
                users.name,
                COUNT(orders.id) AS orders_count
            FROM users
            LEFT JOIN orders
                ON users.id = orders.user_id
            GROUP BY users.name
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3. Заказы
    public function ordersReport() {

        $stmt = $this->db->query("
            SELECT 
                id,
                status,
                created_at
            FROM orders
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 4. Выдачи
    public function issuesReport() {

        $stmt = $this->db->query("
            SELECT 
                order_id,
                issue_date,
                return_date
            FROM issues
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}