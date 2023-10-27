<?php
require_once('database.php');

$email = $_GET['email'];
// $user_id = $_GET['user_id'];
require_once 'check_cookie.php';
$user_id = check_cookie();
if (!$user_id) {
    // header("Location: index.php");
    exit;
}

$subject = 'Регистрация на сайте «MyPC»';
$massege = "
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #280360;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #280360;
        }

        a:hover {
            border: 1px solid #573f7c;
        }

        footer {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class=container>
        <h1>Добро пожаловать на сайт «MyPC»!</h1>
        <p>Для завершения процесса регистрации, перейдите по следующей ссылке:</p>
        <p>
            <a href='https://pr-viganovsky.xn--80ahdri7a.site/confirm_email.php?email={$email}'>Подтвердить почту</a>
        </p>
        <footer>С уважением, администрация, MyPC</footer>
    </div>
</body>
</html>
";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Administrator <admin@pr-viganovsky.xn--80ahdri7a.site>\r\n";
$mail = mail($email, $subject, $massege, $headers);
header("Location: show_user.php");
// header("Location: show_user.php?user_id=" . $user_id);
mysqli_close($connect);
?>