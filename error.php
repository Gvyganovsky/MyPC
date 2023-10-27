<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Упс!</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/error.css">
</head>

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
            <div class="error_body">
                <div class="error_content">
                    <img src="../image/error.png" alt="error" class="error_img">
                    <div class="error_text">
                        <p>Уважаемый пользователь!</p>
                        <p>Наша система не смогла обработать ваше последнее действие, мы уже вкурсе проблемы и решаем ее
                        </p>
                        <p>С уважением, группа поддержки</p>
                        <p>Вернуться на главную страницу: <a href="../index.php" class="link">Кликните сюда</a> </p>
                        <p>Обратиться лично: gvyganovsky@gmail.com</p>
                        <p>Код ошибки:</p>
                        <p class="bold_red">
                            <?php
                            require_once('database.php');
                            echo $_GET['error_message'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
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
</body>

</html>