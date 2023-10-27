<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #280360;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #280360;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #573f7c;
        }

        .error-message {
            color: #FF0000;
        }

        footer {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $mail = $_GET['email'];
        require_once 'database.php';

        $stmt = mysqli_prepare($connect, 'SELECT id_user FROM users WHERE email = (?)');
        mysqli_stmt_bind_param($stmt, 's', $mail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($id) {
            $stmt = mysqli_prepare($connect, 'UPDATE users SET check_email = 1 WHERE id_user = ?');
            mysqli_stmt_bind_param($stmt, 'd', $id);
            $var = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($var) {
                echo "
                <h3>Поздравляем с успешной регистрацией!</h3>
                <p>Электронный адрес успешно подтвержден!</p>
                <a href='show_user.php'>Перейти на свою страницу</a>
                ";
            } else {
                echo "
                <p class='error-message'>Ошибка при обновлении статуса подтверждения адреса электронной почты.</p>
                <a href='show_user.php'>Перейти на свою страницу</a>
                ";
            }
        } else {
            echo "
            <p class='error-message'>Ошибка при подтверждении почты.</p>
            <a href='show_user.php'>Перейти на свою страницу</a>
            ";
        }

        mysqli_close($connect);
        ?>
    </div>
    <!-- <a href='show_user.php?user_id=" . $id . "'>Перейти на свою страницу</a> -->
</body>

</html>