<?php
require_once('database.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$token = bin2hex(random_bytes(15));
// $token_query = "UPDATE users SET token='{$token}' WHERE
//             id_user='{$row["id_user"]}'";
// $token_query = "UPDATE users SET token='{$token}' WHERE
//             id_user='{$row["id_user"]}'";
// $res = mysqli_query($connect, $token_query) or handle_error('Ошибка выдачи токена', mysqli_error($connect));
// if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
//     setcookie('id_user', $row["id_user"], time() + 60 * 24 * 3600);
//     setcookie('token', $token, time() + 60 * 24 * 3600);
// } else {
//     setcookie('id_user', $row["id_user"], time() + 3600);
//     setcookie('token', $token, time() + 3600);
// }
// Сессии
// session_start();
// $_SESSION['id'] = $num;

// Фильтрация данных формы
$first_name = filter_input(
    INPUT_POST,
    'first_name',
    FILTER_VALIDATE_REGEXP,
    array('options' => array('regexp' => '/(^[A-Za-z]+$)|(^[А-ЯЁа-яё]+$)/u'))
);
$last_name = filter_input(
    INPUT_POST,
    'last_name',
    FILTER_VALIDATE_REGEXP,
    array('options' => array('regexp' => '/(^[A-Za-z]+$)|(^[А-ЯЁа-яё]+$)/u'))
);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
// $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Добавление пользователя при помощи подготовленного выражения
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Создаем подготовленное выражение для вставки данных в таблицу users
$stmt = mysqli_prepare($connect, 'INSERT INTO users(first_name, last_name, email, password, token) VALUES (?, ?, ?, ?, ?)');
if (!$stmt) {
    die("Ошибка подготовленного выражения: " . mysqli_error($connect));
}

// Связываем значения с параметрами подготовленного выражения
mysqli_stmt_bind_param($stmt, 'sssss', $first_name, $last_name, $email, $hashed_password, $token);

// Выполняем подготовленное выражение и сохраняем результат
$result = mysqli_stmt_execute($stmt);

if ($result) {
    // Вставка успешна, получаем ID нового пользователя
    $user_id = mysqli_insert_id($connect);
    setcookie('id_user', $user_id);
    setcookie("token", $token);

    header("Location: message.php?email=" . $email);
    // header("Location: message.php?email=" . $email . "&user_id=" . $user_id);
    // Перенаправляем пользователя на страницу show_user.php с передачей user_id в URL

} else {
    echo "Ошибка при регистрации пользователя: " . mysqli_error($connect);
}

mysqli_close($connect);
