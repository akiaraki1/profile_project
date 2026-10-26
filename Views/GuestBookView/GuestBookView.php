<?php
// Собираем весь текст ЗАРАНЕЕ, до textarea — так чище
$lines = [];

foreach ($messages as $msg) {
    $lines[] = "[{$msg['time']}] {$msg['name']}:\n{$msg['message']}";
}

$text = implode("\n\n", $lines);   // между записями — пустая строка
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <h1>Гостевая книга</h1>

    <textarea readonly><?= htmlspecialchars($text) ?></textarea>

    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Введите ваше имя" required>
        <textarea name="message" class="small" placeholder="Добавьте запись" required></textarea>
        <button type="submit">Отправить</button>
    </form>
</main>
</body>
</html>