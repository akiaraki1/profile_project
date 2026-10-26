<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../AutView/AutIndex.php');
    die();
}
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ваш профиль</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Ваш профиль</h5>
      <a class="btn btn-outline-primary ml-2" href="logout.php">Выйти</a>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Добро пожаловать</h1>
      <p class="lead">Кликнете на картинки.</p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Гостевая книга</h4>
          </div>
          <div class="card-body">
            <a href="../GuestBookView/index.php"><img src="../Images/Гостевая книга.png" alt="Гостевая книга"></a>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Фотогалерея</h4>
          </div>
          <div class="card-body">
            <a href="photo-gallery.php"><img src="../Images/Фотогалерея.png" alt="Фотогалерея"></a>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Калькулятор</h4>
          </div>
          <div class="card-body">
            <a href="calculator.php"><img src="../Images/Калькулятор.png" alt="Калькулятор"></a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
