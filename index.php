<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мой ПК</title>
    <link rel="icon" href="./image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/cookie.css">
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
            <div class="auth_body">
                <div class="auth_info">
                    <form action="./auth.php" method="POST" enctype="multipart/form-data" class="auth_block"
                        id="auth_form">
                        <div class="auth_logoBlock">
                            <img src="./image/logo.png" alt="logo" class="auth_logo">
                            <h2 class="auth_title-text">Мой ПК</h2>
                        </div>
                        <h1 class="auth_title">Войти</h1>
                        <p class="auth_p">(Для совершения покупок!)</p>
                        <div class="auth_input">
                            <img src="./image/icons/mail.png" alt="mail" class="auth_icon">
                            <input name="email" type="email" placeholder="Email" id="emailInput">
                        </div>
                        <div class="invalid-feedback" id="emailError"></div>
                        <div class="auth_input">
                            <img src="./image/icons/password.png" alt="password" class="auth_icon">
                            <input name="password" type="password" placeholder="Password" id="passwordInput">
                        </div>
                        <div class="invalid-feedback" id="passwordError"></div>
                        <button class="auth_but" id="submit">Войти</button>
                        <a href="#" class="auth_text">Забыли Почту/Пароль?</a>
                        <a href="./registration.php" class="auth_login">Регистрация</a>
                    </form>
                </div>
            </div>
            <div class="cookie-div">
                <p>Этот сайт использует файлы cookie.</p>
                <button id="accept-cookie">Принять</button>
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
    <script src="./js/login.js"></script>
    <script src="./js/cookie.js"></script>
</body>

</html>