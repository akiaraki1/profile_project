<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Авторизация</title>
</head>
<body>
    <div class="container">
        <h1>Авторизация</h1>
        <form action="AutIndex.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" value="<?= htmlspecialchars($_POST['login'] ?? '')?>" name="login" placeholder="Введите ваш логин. Минимум 8 символов">
                <?php if (isset($errors['invalidLogin'])): ?>
                    <p class="error"><?= htmlspecialchars($errors['invalidLogin']) ?></p>
                <?php elseif (isset($errors['existsLogin'])): ?>
                    <p class="error"><?= htmlspecialchars($errors['existsLogin']) ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" value="<?= htmlspecialchars($_POST['email'] ?? '')?>" name="email" placeholder="Введите ваш адрес почты. Минимум 6 символов">
                <?php if (isset($errors['invalidEmail'])): ?>
                    <p class="error"><?= htmlspecialchars($errors['invalidEmail']) ?></p>
                <?php elseif (isset($errors['existsEmail'])): ?>
                    <p class="error"><?= htmlspecialchars($errors['existsEmail']) ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  name="password" placeholder="Введите ваш пароль. Минимум 8 символов">
                <?php if (isset($errors['password'])): ?>
                    <p class="error"><?= htmlspecialchars($errors['password']) ?></p>
                <?php endif; ?>
            </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-primary" name="submit">Войти</button>
            </div>
        </form>
    </div>
</body>
</html>