<?php
    session_start();
    include "data.get.php";
    $url = "../data/users.json";
    $users = get_user($url);
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $is_user = false;
    foreach($users as $i => $user){
        if($user->username == $username){
            $id = $i;
            $is_user = true;
            break;
        }
    }
    if(!$is_user){
        header("Location: /");
        die();
    }

    $users[$id]->fullname = $fullname;
    $users[$id]->email = $email;
    $users[$id]->password = password_hash($password,PASSWORD_DEFAULT);

    file_put_contents($url,json_encode($users,JSON_PRETTY_PRINT));
    $_SESSION["user_details"] = $users[$id];
    header("Location: /views/usr.inf.php");
