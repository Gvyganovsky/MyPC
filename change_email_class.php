<?php 
    require 'user.php';

    $id = $_GET['user_id'];
    $email = $_GET['email'];

    $user = new user();
    $user->change_email($id, $email);
    //https://pr-viganovsky.xn--80ahdri7a.site/change_email_class.php?user_id=190&email=sfasdfas@s.ru
?>