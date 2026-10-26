<?php

require_once(__DIR__ . "/../Models/RegAthModel.php");
class RegAthController
{
    private RegAthModel $model;

    private $login;
    private $email;
    private $password;
    private $repeatPassword;

    public $errors = [];

    public function __construct()
    {
        $this->model = new RegAthModel();
    }

    public function checkPostReg($login, $email, $password, $repeatPassword)
    {

        $this->login = trim($login ?? '');
        $this->email = filter_var(trim($email ?? ''), FILTER_VALIDATE_EMAIL);
        $this->password = $password ?? '';
        $this->repeatPassword = $repeatPassword ?? '';

    }

    public function checkPostAut($login, $email, $password)
    {

        $this->login = trim($login ?? '');
        $this->email = filter_var(trim($email ?? ''), FILTER_VALIDATE_EMAIL);
        $this->password = $password ?? '';

    }

    public function getVerify()
    {
        return $this->model->verify($this->login, $this->email, $this->password);
    }

    public function errorsPostReg()
    {

        if ((empty($this->login)) || (mb_strlen($this->login) < 8)) {
            $this->errors['invalidLogin'] = 'Неверный логин';
        }

        if ($this->model->loginExists($this->login)) {
            $this->errors['existsLogin'] = 'логин уже существует';
        }

        if ((empty($this->email)) || (mb_strlen($this->email) < 6)) {
            $this->errors['invalidEmail'] = 'Неверный адрес почты';
        }

        if ($this->model->emailExists($this->email)) {
            $this->errors['existsEmail'] = 'адрес почты уже существует';
        }

        if (empty($this->password) || mb_strlen($this->password) < 8) {
            $this->errors['password'] = 'Неверный пароль';
        }

        if ($this->password !== $this->repeatPassword) {
            $this->errors['repeatPassword'] = 'Пароли не совпадают';
        }
    }

    public function errorsPostAut()
    {

        if ((empty($this->login)) || (mb_strlen($this->login) < 8)) {
            $this->errors['invalidLogin'] = 'Неверный логин';
        }


        if ((empty($this->email)) || (mb_strlen($this->email) < 6)) {
            $this->errors['invalidEmail'] = 'Неверный адрес почты';
        }

        if (empty($this->password) || mb_strlen($this->password) < 8) {
            $this->errors['password'] = 'Неверный пароль';
        }

    }

    public function indexReg()
    {
        $errors = $this->errors;
        require __DIR__ . "/../Views/RegView/RegView.php";
    }

    public function indexAut()
    {
        $errors = $this->errors;
        require __DIR__ . "/../Views/AutView/AutView.php";
    }

    public function add()
    {
        $userId = $this->model->insert($this->login, $this->email, $this->password);
        session_start();
        $_SESSION['id'] = $userId;
        header('Location: ../MainProfileView/profile.php');
        exit;
    }

}
