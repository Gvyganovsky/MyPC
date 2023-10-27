<?php
session_start();
require_once 'database.php';

$email = $_POST["email"];
$password = $_POST["password"];

$stmt = mysqli_query($connect, "SELECT * FROM users WHERE email = '" . $email . "';");
if ($stmt) {
    while ($row = mysqli_fetch_array($stmt)) {
        if (password_verify($password, $row["password"])) {
            $_SESSION['id_user'] = $row['id_user'];
            session_regenerate_id(true);
            header("Location: show_user.php");
        }
    }
} else {
    echo mysqli_error($connect);
}
