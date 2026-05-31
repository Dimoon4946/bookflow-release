<?php
namespace Controllers;

use Models\Order;

class OrderController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public function index() {

    $orderModel = new Order($this->db);

    $orders = $orderModel->getAll();

    $title = 'Заказы';

    ob_start();

    include SRC_PATH . 'views/orders.php';

    $content = ob_get_clean();

    include SRC_PATH . 'views/layout.php';
}
}