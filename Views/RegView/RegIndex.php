<?php

require_once __DIR__ . '/../../Controllers/RegAthController.php';

$controller = new RegAthController();

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->checkPostReg($_POST['login'], $_POST['email'], $_POST['password'], $_POST['repeatPassword']);
    $controller->errorsPostReg();
    if ($controller->errors === []) {
        $controller->add();
    } else {
        $controller->indexReg();
    }
} else {
    $controller->indexReg();
}
