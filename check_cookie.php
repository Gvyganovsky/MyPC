<?php
function check_cookie()
{
    require 'database.php';
    $user_id = filter_input(INPUT_COOKIE, 'id_user', FILTER_VALIDATE_INT);
    $token = filter_input(
        INPUT_COOKIE,
        'token',
        FILTER_VALIDATE_REGEXP,
        array('options' => array('regexp' => '/^[0-9a-f]+$/'))
    );
    $query = "SELECT token FROM users WHERE id_user='{$user_id}'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    if(isset($token)){
        if ($token == $row['token']) {
            return $user_id;
        } else {
            return false;
        }
    }
    else{
        header("Location: index.php");    
    }
}

?>