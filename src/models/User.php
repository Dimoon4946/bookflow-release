<?php
namespace Models;

use PDO;

class User {
    public $id;
    public $name;
    public $email;
    public $password;
    public $role;

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public static function authenticate(PDO $db, $email, $password) {
        $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $obj = new self($db);
            $obj->id = $user['id'];
            $obj->name = $user['name'];
            $obj->role = $user['role'];
            return $obj;
        }
        return false;
    }

    public static function getAll(PDO $db) {
    $stmt = $db->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}