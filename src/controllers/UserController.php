<?php
namespace Controllers;

use Models\User;

class UserController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public function users() {

    $users = \Models\User::getAll($this->db);

    $title = 'Пользователи';

    ob_start();

    include SRC_PATH . 'views/users.php';

    $content = ob_get_clean();

    include SRC_PATH . 'views/layout.php';
}

public function loginForm() {

    $title = 'Авторизация';

    ob_start();

    include SRC_PATH . 'views/Login.php';

    $content = ob_get_clean();

    include SRC_PATH . 'views/layout.php';
}

    public function authenticate() {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($email) || empty($password)) {
            die("Ошибка: пустые данные");
        }

        $user = User::authenticate($this->db, $email, $password);

        if ($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role'] = $user->role;
            header("Location: /bookflow/public/");
            exit;
        } else {
            echo "Ошибка входа";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /bookflow/public/login");
        exit;
    }

public function index() {

    $title = 'Главная';

    ob_start();

    include SRC_PATH . 'views/home.php';

    $content = ob_get_clean();

    include SRC_PATH . 'views/layout.php';
}
}