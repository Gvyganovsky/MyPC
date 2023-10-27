<?php 
    require 'user.php';

    $id = $_GET['user_id'];

    $user = new user();
    $result = $user->show_user($id);
    echo $result;
    // https://pr-viganovsky.xn--80ahdri7a.site/show_user_class.php?user_id=190
?>