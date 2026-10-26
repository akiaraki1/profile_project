## Установка и настройка базы данных

### Требования
- PHP 8.5+
- MySQL 8.4
- OSPanel (или аналогичное окружение)

### 1. Создание базы данных для входа

Создайте базу данных `login_register` с кодировкой `utf8mb4`:

```sql
CREATE DATABASE login_register CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

### 2. Создание таблицы `users`

```sql
USE login_register;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(200) NOT NULL,
    password VARCHAR(255) NOT NULL
);
```

### 3. Настройка подключения

Подключение к БД настраивается в файле `Models/RegAthModel.php`:

```php
$dsn = 'mysql:host=MySQL-8.4;dbname=login_register;charset=utf8mb4';
$this->dbh = new PDO($dsn, 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
```

**Параметры подключения:**
| Параметр | Значение |
|---|---|
| Host | `MySQL-8.4` |
| Database | `login_register` |
| User | `root` |
| Password | *(пусто)* |
| Charset | `utf8mb4` |

> ⚠️ Хост `MySQL-8.4` — это имя сервера, заданное в OSPanel. Если вы запускаете проект в другом окружении, замените его на `localhost` или `127.0.0.1`.


---

## База данных для гостевой книги

### 1. Создание базы данных

Создайте базу данных `guestbook` с кодировкой `utf8mb4`:

```sql
CREATE DATABASE guestbook CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

### 2. Создание таблицы `messages`

```sql
USE guestbook;

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    time DATETIME NOT NULL
);
```

### 3. Настройка подключения

Подключение к БД настраивается в файле `Models/GuestBookModel.php`:

```php
$dsn = 'mysql:host=MySQL-8.4;dbname=guestbook;charset=utf8mb4';
$this->dbh = new PDO($dsn, 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
```

**Параметры подключения:**
| Параметр | Значение |
|---|---|
| Host | `MySQL-8.4` |
| Database | `guestbook` |
| User | `root` |
| Password | *(пусто)* |
| Charset | `utf8mb4` |

> ⚠️ Хост `MySQL-8.4` — имя сервера в OSPanel. Для другого окружения замените на `localhost` или `127.0.0.1`.