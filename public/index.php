<?php
session_start();

define('SRC_PATH', dirname(__DIR__) . '/src/');

require_once dirname(__DIR__) . '/vendor/autoload.php';

require_once SRC_PATH . 'settings/pdo.php';
$conn = getConnection();

$pdo = $conn[1];

$routes = require SRC_PATH . 'settings/routes.php';

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = parse_url($requestUri, PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$requestUri = str_replace('/bookflow/public', '', $requestUri);
$requestUri = rtrim($requestUri, '/');

if ($requestUri === '') {
    $requestUri = '/';
}

foreach ($routes[$requestMethod] as $path => $route) {
    if ($path === $requestUri) {
        $controllerName = $route['controller'];
        $action = $route['action'];

require_once SRC_PATH . 'controllers/UserController.php';
require_once SRC_PATH . 'models/User.php';

require_once SRC_PATH . 'controllers/BookController.php';
require_once SRC_PATH . 'models/Book.php';

require_once SRC_PATH . 'controllers/OrderController.php';
require_once SRC_PATH . 'models/Order.php';

require_once SRC_PATH . 'controllers/IssueController.php';
require_once SRC_PATH . 'models/Issue.php';

require_once SRC_PATH . 'controllers/ReportController.php';
require_once SRC_PATH . 'models/Report.php';

$publicRoutes = ['/', '/login'];

$adminRoutes = [
    '/users',
    '/orders',
    '/issues',
    '/reports'
];

if (
    isset($_SESSION['role']) &&
    $_SESSION['role'] !== 'admin' &&
    in_array($requestUri, $adminRoutes)
) {

    echo "Доступ запрещён";

    exit;
}

if (
    !isset($_SESSION['user_id']) &&
    !in_array($requestUri, $publicRoutes)
) {
    header("Location: /bookflow/public/login");
    exit;
}

        $controller = new $controllerName($pdo);
        $controller->$action();
        exit;
    }
}

echo "404";