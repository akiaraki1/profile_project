<?php

require_once __DIR__ . '/../../Controllers/RegAthController.php';

$controller = new RegAthController();

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->checkPostAut($_POST['login'], $_POST['email'], $_POST['password']);
    $controller->errorsPostAut();
    if ($controller->errors === [] && $controller->getVerify()) {
        session_start();
        $_SESSION['id'] = $controller->getVerify();
        header('Location: ../MainProfileView/profile.php');
        exit;
    } else {
        $controller->indexAut();
    }
} else {
    $controller->indexAut();
}
