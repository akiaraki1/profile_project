<?php
require_once(__DIR__ . "/../Models/GuestBookModel.php");
class GuestBookController {
    private GuestBookModel $model;

    public function __construct() {
       $this->model = new GuestBookModel() ;
    }

    public function index() {
        $messages = $this->model->getAll();

        require_once (__DIR__ ."/../Views/GuestBookView/GuestBookView.php");
    }
    public function add() {
        $name = trim($_POST['name'] ?? '');
        $message = trim($_POST['message'] ?? '');

        if ($name !== '' && $message !== '') {
            date_default_timezone_set("Europe/Moscow");
            $this->model->insert($name, $message, date('Y-m-d H:i:s'));
        }

        header('Location: index.php');
        exit;
    }


}