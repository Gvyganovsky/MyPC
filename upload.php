<?php
require_once('database.php');

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];

    // Проверяем, был ли файл успешно загружен
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_path = './image/userImages/' . basename($_FILES['photo']['name']); // Путь к загруженной фотографии
        // $upload_filename = $_FILES['photo']['name']; // Сохраняем в папку userImages

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path)) {
            // Подготовленный запрос
            $updateQuery = "UPDATE users SET photo = ? WHERE id_user = ?";

            // Создание подготовленного запроса
            $stmt = mysqli_prepare($connect, $updateQuery);

            if ($stmt) {
                // Привязка значений к параметрам
                mysqli_stmt_bind_param($stmt, "si", $photo_path, $user_id);

                // Выполнение запроса
                if (mysqli_stmt_execute($stmt)) {
                    // Успешно обновлена запись
                    header("Location: show_user.php");
                    // header("Location: show_user.php?user_id=" . $user_id);
                    exit();
                } else {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connect);
                }

                // Закрыть подготовленный запрос
                mysqli_stmt_close($stmt);
            } else {
                echo "Ошибка при создании подготовленного запроса: " . mysqli_error($connect);
            }
        } else {
            echo "Ошибка при перемещении загруженного файла.";
        }
    } else {
        header("Location: show_user.php");
        // header("Location: show_user.php?user_id=" . $user_id);
    }
}
?>
