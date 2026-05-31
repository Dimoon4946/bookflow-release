<?php
namespace Controllers;

use Models\Book;

class BookController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function order() {

    $bookId = $_GET['id'];

    $userId = $_SESSION['user_id'];

    $stmt = $this->db->prepare("
        INSERT INTO orders (
            user_id,
            book_id,
            status,
            created_at
        )
        VALUES (?, ?, ?, NOW())
    ");

    $stmt->execute([
        $userId,
        $bookId,
        'new'
    ]);

    header("Location: /bookflow/public/books");

    exit;
}

public function index() {
    $bookModel = new Book($this->db);

    $books = $bookModel->getAll();

    $title = 'Книги';

    ob_start();

    include SRC_PATH . 'views/books.php';

    $content = ob_get_clean();

    include SRC_PATH . 'views/layout.php';
}

    public function store() {
        $title = trim($_POST['title']);
        $author = trim($_POST['author']);

        if (empty($title) || empty($author)) {
            die("Ошибка: пустые данные");
        }

        $bookModel = new Book($this->db);
        $bookModel->create($title, $author);

        header("Location: /bookflow/public/books");
        exit;
    }

    public function delete() {
        $id = (int) $_GET['id'];

        $bookModel = new Book($this->db);
        $bookModel->delete($id);

        header("Location: /bookflow/public/books");
        exit;
    }
}