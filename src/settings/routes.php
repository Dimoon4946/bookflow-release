<?php
return [
    'GET' => [
        '/users' => ['controller' => 'Controllers\UserController', 'action' => 'users'],
        '/login' => ['controller' => 'Controllers\UserController', 'action' => 'loginForm'],
        '/' => ['controller' => 'Controllers\UserController', 'action' => 'index'],
        '/orders' => ['controller' => 'Controllers\OrderController', 'action' => 'index'],
'/issues' => ['controller' => 'Controllers\IssueController', 'action' => 'index'],
'/reports' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'index'
],
'/logout' => [
    'controller' => 'Controllers\UserController',
    'action' => 'logout'
],

'/books/order' => [
    'controller' => 'Controllers\\BookController',
    'action' => 'order'
],

'/reports/docx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'exportDOCX'
],

'/reports/xlsx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'exportXLSX'
],

'/reports/books/docx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'booksDOCX'
],

'/reports/books/xlsx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'booksXLSX'
],

'/reports/users/docx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'usersDOCX'
],

'/reports/users/xlsx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'usersXLSX'
],

'/reports/orders/docx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'ordersDOCX'
],

'/reports/orders/xlsx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'ordersXLSX'
],

'/reports/issues/docx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'issuesDOCX'
],

'/reports/issues/xlsx' => [
    'controller' => 'Controllers\\ReportController',
    'action' => 'issuesXLSX'
],
        

        // КНИГИ
        '/books' => ['controller' => 'Controllers\BookController', 'action' => 'index'],
        '/books/delete' => ['controller' => 'Controllers\BookController', 'action' => 'delete'],
    ],

    'POST' => [
        '/login' => ['controller' => 'Controllers\UserController', 'action' => 'authenticate'],

        // КНИГИ
        '/books' => ['controller' => 'Controllers\BookController', 'action' => 'store'],
    ],
];