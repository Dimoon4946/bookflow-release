<?php

namespace Controllers;

use Models\Report;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class ReportController {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // =========================
    // ГЛАВНАЯ СТРАНИЦА ОТЧЁТОВ
    // =========================

    public function index() {

        $reportModel = new Report($this->db);

        $books = $reportModel->booksReport();
        $users = $reportModel->usersReport();
        $orders = $reportModel->ordersReport();
        $issues = $reportModel->issuesReport();

        $title = 'Отчёты';

        ob_start();

        include SRC_PATH . 'views/reports.php';

        $content = ob_get_clean();

        include SRC_PATH . 'views/layout.php';
    }

    // =========================
    // BOOKS DOCX
    // =========================

    public function booksDOCX() {

        $reportModel = new Report($this->db);

        $books = $reportModel->booksReport();

        $phpWord = new PhpWord();

        $section = $phpWord->addSection();

        $section->addText('Отчёт по книгам');

        foreach ($books as $book) {

            $section->addText(
                $book['title'] .
                ' | Заказов: ' .
                $book['orders_count']
            );
        }

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        header(
            'Content-Disposition: attachment;filename="books_report.docx"'
        );

        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $writer->save('php://output');

        exit;
    }

    // =========================
    // BOOKS XLSX
    // =========================

    public function booksXLSX() {

        $reportModel = new Report($this->db);

        $books = $reportModel->booksReport();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Книга');
        $sheet->setCellValue('B1', 'Количество заказов');

        $row = 2;

        foreach ($books as $book) {

            $sheet->setCellValue('A' . $row, $book['title']);
            $sheet->setCellValue('B' . $row, $book['orders_count']);

            $row++;
        }

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        header(
            'Content-Disposition: attachment;filename="books_report.xlsx"'
        );

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');

        exit;
    }

    // =========================
    // USERS DOCX
    // =========================

    public function usersDOCX() {

        $reportModel = new Report($this->db);

        $users = $reportModel->usersReport();

        $phpWord = new PhpWord();

        $section = $phpWord->addSection();

        $section->addText('Отчёт по пользователям');

        foreach ($users as $user) {

            $section->addText(
                $user['name'] .
                ' | Заказов: ' .
                $user['orders_count']
            );
        }

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        header(
            'Content-Disposition: attachment;filename="users_report.docx"'
        );

        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $writer->save('php://output');

        exit;
    }

    // =========================
    // USERS XLSX
    // =========================

    public function usersXLSX() {

        $reportModel = new Report($this->db);

        $users = $reportModel->usersReport();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Пользователь');
        $sheet->setCellValue('B1', 'Количество заказов');

        $row = 2;

        foreach ($users as $user) {

            $sheet->setCellValue('A' . $row, $user['name']);
            $sheet->setCellValue('B' . $row, $user['orders_count']);

            $row++;
        }

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        header(
            'Content-Disposition: attachment;filename="users_report.xlsx"'
        );

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');

        exit;
    }

    // =========================
    // ORDERS DOCX
    // =========================

    public function ordersDOCX() {

        $reportModel = new Report($this->db);

        $orders = $reportModel->ordersReport();

        $phpWord = new PhpWord();

        $section = $phpWord->addSection();

        $section->addText('Отчёт по заказам');

        foreach ($orders as $order) {

            $section->addText(
                'ID: ' . $order['id'] .
                ' | Статус: ' . $order['status']
            );
        }

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        );

        header(
            'Content-Disposition: attachment;filename="orders_report.docx"'
        );

        $writer = IOFactory::createWriter($phpWord, 'Word2007');

        $writer->save('php://output');

        exit;
    }

    // =========================
    // ORDERS XLSX
    // =========================

    public function ordersXLSX() {

        $reportModel = new Report($this->db);

        $orders = $reportModel->ordersReport();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Статус');
        $sheet->setCellValue('C1', 'Дата');

        $row = 2;

        foreach ($orders as $order) {

            $sheet->setCellValue('A' . $row, $order['id']);
            $sheet->setCellValue('B' . $row, $order['status']);
            $sheet->setCellValue('C' . $row, $order['created_at']);

            $row++;
        }

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        header(
            'Content-Disposition: attachment;filename="orders_report.xlsx"'
        );

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');

        exit;
    }

    // =========================
    // ISSUES DOCX
    // =========================

    public function issuesDOCX() {

    $reportModel = new Report($this->db);

    $issues = $reportModel->issuesReport();

    $phpWord = new PhpWord();

    $section = $phpWord->addSection();

    $section->addText('Отчёт по выдачам');

    foreach ($issues as $issue) {

        $section->addText(
            'Заказ: ' . $issue['order_id'] .
            ' | Выдача: ' . $issue['issue_date'] .
            ' | Возврат: ' . $issue['return_date']
        );
    }

    header(
        'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    );

    header(
        'Content-Disposition: attachment;filename="issues_report.docx"'
    );

    $writer = IOFactory::createWriter($phpWord, 'Word2007');

    $writer->save('php://output');

    exit;
}

    // =========================
    // ISSUES XLSX
    // =========================

    public function issuesXLSX() {

        $reportModel = new Report($this->db);

        $issues = $reportModel->issuesReport();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID заказа');
        $sheet->setCellValue('B1', 'Дата выдачи');
        $sheet->setCellValue('C1', 'Дата возврата');

        $row = 2;

        foreach ($issues as $issue) {

            $sheet->setCellValue('A' . $row, $issue['order_id']);
            $sheet->setCellValue('B' . $row, $issue['issue_date']);
            $sheet->setCellValue('C' . $row, $issue['return_date']);

            $row++;
        }

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        header(
            'Content-Disposition: attachment;filename="issues_report.xlsx"'
        );

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');

        exit;
    }
}