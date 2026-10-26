<?php

session_start();

$_SESSION = [];      // стираем данные
session_destroy();   // уничтожаем сессию

header('Location: index.php');
exit;
