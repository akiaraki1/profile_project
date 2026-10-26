<?php

class RegAthModel
{
    private PDO $dbh;
    private string $table = 'users';

    public function __construct()
    { //подключение к бд
        $dsn = 'mysql:host=MySQL-8.4;dbname=login_register;charset=utf8mb4';
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

    public function insert($login, $email, $password)
    {
        $stmt = $this->dbh->prepare("INSERT INTO {$this->table} (login, email, password) VALUES (:login, :email, :password)");
        $stmt->execute([
            'login' => $login,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
        return (int)$this->dbh->lastInsertId();
    }

    public function getByLogin($login)
    {
        $stmt = $this->dbh->prepare("SELECT * FROM {$this->table} WHERE login = :login");
        $stmt->execute(['login' => $login]);
        return $stmt->fetch() ?: null;
    }

    public function getByEmail($email)
    {
        $stmt = $this->dbh->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch() ?: null;
    }

    public function loginExists($login)
    {
        return $this->getByLogin($login) !== null;
    }

    public function emailExists($email)
    {
        return $this->getByEmail($email) !== null;
    }
     
    public function verify($login, $email, $password)
    {

        $user = $this->getByLogin($login);


        if ($user === null) {
            return null;
        }


        if ($user['email'] !== $email) {
            return null;
        }

        if (!password_verify($password, $user['password'])) {
            return null;
        }

        return $user['id'];
    }
}
