<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мой ПК</title>
    <link rel="icon" href="../image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/registration.css">
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
                    <form action="./create_user.php" method="POST" enctype="multipart/form-data" class="auth_block"
                        id="auth_form">
                        <div class="auth_logoBlock">
                            <img src="./image/logo.png" alt=" logo" class="auth_logo">
                            <h2 class="auth_title-text">Мой ПК</h2>
                        </div>
                        <h1 class="auth_title">Регистрация</h1>
                        <p class="auth_p">(Для совершения покупок!)</p>
                        <div class="auth_input">
                            <img src="./image/icons/name.png" alt="Name" class="auth_icon">
                            <input name="first_name" type="text" placeholder="Name" id="first_nameInput">
                        </div>
                        <div class="invalid-feedback" id="firstNameError"></div>
                        <div class="auth_input">
                            <img src="./image/icons/name.png" alt="Last name" class="auth_icon">
                            <input name="last_name" type="text" placeholder="Last name" id="last_nameInput">
                        </div>
                        <div class="invalid-feedback" id="lastNameError"></div>
                        <div class="auth_input">
                            <img src="./image/icons/mail.png" alt="Email" class="auth_icon">
                            <input name="email" type="email" placeholder="Email" id="emailInput">
                        </div>
                        <div class="invalid-feedback" id="emailError"></div>
                        <div class="invalid-feedback hidden" id="emailUniq">Почта уже существует!</div>
                        <div class="auth_input">
                            <img src="./image/icons/password.png" alt="password" class="auth_icon">
                            <input name="password" type="password" placeholder="Password" id="passwordInput">
                        </div>
                        <div class="invalid-feedback" id="passwordError"></div>
                        <div class="auth_input">
                            <img src="./image/icons/password.png" alt="password" class="auth_icon">
                            <input name="passwordRepeat" type="password" placeholder="Repet password"
                                id="passwordRepeatInput">
                        </div>
                        <div class="invalid-feedback" id="passwordRepeatError"></div>
                        <button class="auth_but" id="submit">Регистрация</button>
                        <a href="#" class="auth_text">Забыли Почту/Пароль?</a>
                        <a href="./index.php" class="auth_login">Войти</a>
                    </form>
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

    <script src="./js/validation.js"></script>
    <script src="./js/check_email.js"></script>
    <script src="./js/checkErrors.js"></script>
</body>

</html>