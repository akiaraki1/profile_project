<?php

class GuestBookModel
{
    private PDO $dbh;
    private string $table = 'messages';

    public function __construct() //подключение к бд
    {
        $dsn = 'mysql:host=MySQL-8.4;dbname=guestbook;charset=utf8mb4';
        $this->dbh = new PDO($dsn, 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //остановка скрипта при ошибке
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //Ассоциативный массив
        ]);
    }

    public function getAll()
    {
        $stmt = $this->dbh->query("SELECT * FROM {$this->table} ORDER BY id");
        return $stmt->fetchAll();

    }

    public function insert($name, $message, $time)
    {
        $stmt = $this->dbh->prepare("INSERT INTO {$this->table} (name, message, time) VALUES (:name, :message, :time)");
        $stmt->execute([
            'name' => $name,
            'message' => $message,
            'time' => $time,
        ]);
    }
}
