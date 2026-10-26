<?php

require_once __DIR__ . '/../../Controllers/GuestBookController.php';

$controller = new GuestBookController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->add();      // пришла форма → обработать
} else {
    $controller->index();    // просто открыли страницу → показать список
}
