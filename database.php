<?php
$host = 'localhost';
$user = '322-20_gvyganovsky';
$pass = '666Archer666';
$database = '322-20_my_pc';

$connect = mysqli_connect($host, $user, $pass, $database);
mysqli_set_charset($connect, "utf8"); // Устанавливаем кодировку UTF-8 для работы с русскими символами

if (!$connect) {
    header("Location: error.php?error_message=Ошибка подключения к серверу");
} else {
    return $connect;
}
?>