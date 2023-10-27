<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
require_once('database.php');
$stmt = mysqli_prepare($connect, 'SELECT id_user FROM users WHERE email=(?)');
mysqli_stmt_bind_param($stmt, 's', $email);
$answ = mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $user_id);
mysqli_stmt_fetch($stmt);

// $response = array();

if ($user_id) {
    $response = false;
} else {
    $response = true;
}

echo $response;


// $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
// require_once('database.php');
// $stmt = mysqli_prepare($connect, 'SELECT id_user FROM users WHERE email=(?)');
// mysqli_stmt_bind_param($stmt, 's', $email);
// $answ = mysqli_stmt_execute($stmt);

// mysqli_stmt_bind_result($stmt, $user_id);
// mysqli_stmt_fetch($stmt);

// if ($user_id) {
//     $response = 'not_unique'; // Если почта уже существует
// } else {
//     $response = 'unique'; // Если почта уникальна
// }

// echo $response;


?>