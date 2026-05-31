<?php
namespace Controllers;

use Models\Issue;

class IssueController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

public function index() {

    $issueModel = new Issue($this->db);

    $issues = $issueModel->getAll();

    $title = 'Выдачи';

    ob_start();

    include SRC_PATH . 'views/issues.php';

    $content = ob_get_clean();

    include SRC_PATH . 'views/layout.php';
}
}