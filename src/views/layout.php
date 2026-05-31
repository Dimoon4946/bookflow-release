<?php
if (!isset($title)) {
    $title = 'BookFlow';
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title) ?></title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        .header {
            background: #1f4e79;
            padding: 16px 24px;
        }

        .header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-right: 16px;
        }

        .header a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 24px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 16px;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #1f4e79;
            color: white;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            background: #1f4e79;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.9;
        }

        form input {
            padding: 8px;
            margin-right: 8px;
            margin-bottom: 8px;
        }

    </style>

</head>

<body>

<div class="header">

    <a href="/bookflow/public/">
        Главная
    </a>

    <?php if (!isset($_SESSION['user_id'])): ?>

        <a href="/bookflow/public/login">
            Логин
        </a>

    <?php endif; ?>


    <?php if (isset($_SESSION['user_id'])): ?>

        <a href="/bookflow/public/books">
            Книги
        </a>

        <?php if (
            isset($_SESSION['role']) &&
            $_SESSION['role'] === 'admin'
        ): ?>

            <a href="/bookflow/public/users">
                Пользователи
            </a>

            <a href="/bookflow/public/orders">
                Заказы
            </a>

            <a href="/bookflow/public/issues">
                Выдачи
            </a>

            <a href="/bookflow/public/reports">
                Отчёты
            </a>

        <?php endif; ?>

        <a href="/bookflow/public/logout">
            Выход
        </a>

    <?php endif; ?>

</div>

<div class="container">

    <div class="card">

        <?= $content ?? '' ?>

    </div>

</div>

</body>
</html>