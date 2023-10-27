<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мой ПК</title>
    <link rel="icon" href="./image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/show_user.css">
</head>

<?php
session_start();
require_once 'database.php';
require_once 'check_cookie.php';

if (isset($_SESSION['id_user'])) {
    $query = "SELECT * FROM users WHERE id_user = " . $_SESSION['id_user'] . "";
    echo "сессия";
} else {
    $user_id = check_cookie();
    $query = "SELECT * FROM users WHERE id_user = $user_id";
    echo "куки";
}

$result = mysqli_query($connect, $query);

if (!$result) {
    echo "Ошибка при выполнении SQL-запроса: " . mysqli_connect_error();
    exit;
}

// Получите данные пользователя
$row = mysqli_fetch_assoc($result);

// Закройте соединение с базой данных
mysqli_close($connect);
?>


<body class="body">
    <div class="wrapper">
        <header class="header">
            <nav class="menu">
                <ul class="list">
                    <li><a href="./index.php">Главная</a></li>
                </ul>
                <img src="../image/logo.png" alt="logo" class="header_logo">
                <ul class="list">
                    <li><a href="./index.php">О нас</a></li>
                </ul>
            </nav>
        </header>

        <div class="content">
            <section class="user_body">
                <div class="user_content">
                    <h1 class="user_title">Личный кабинет</h1>
                    <div class="user_inner">
                        <div class="user_info-block">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <!-- Добавьте скрытое поле для передачи user_id -->
                                <input type="hidden" name="user_id" value="<?php
                                // echo $user_id;
                                if (isset($_SESSION['id_user'])) {
                                    echo $_SESSION['id_user'];
                                } else {
                                    echo $user_id;
                                }
                                ?>">
                                <label for="fileInput">
                                    <img src="<?php if ($row['photo'] != null) {
                                        echo $row['photo'];
                                    } else {
                                        echo './image/logo.png';
                                    } ?>" alt="Upload Image" class="user_image">
                                    <input type="file" id="fileInput" name="photo" accept="image/* " class="input_none">
                                    <button type="submit" class="user_button-download">Загрузить</button>
                                    <button class="user_button-delete">Удалить</button>
                                </label>
                            </form>
                        </div>

                        <div class="user_info-block">
                            <div class="user_info">
                                <div class="user_info-text">
                                    <?php echo $row['first_name']; ?>
                                </div>
                                <div class="user_info-text">
                                    <?php echo $row['last_name']; ?>
                                </div>
                                <div class="user_info-text">
                                    <?php echo $row['email']; ?>
                                </div>
                            </div>
                            <form method="post" action="logout.php">
                                <button type="submit" class="user_button-exit">Выйти</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="footer">
            <nav class="menu">
                <ul class="list">
                    <li><a href="#">Главная</a></li>
                </ul>
                <img src="../image/logo.png" alt="logo" class="header_logo">
                <ul class="list">
                    <li><a href="#">О нас</a></li>
                </ul>
            </nav>
        </footer>
    </div>

</html>