<?php
    session_start();
    include "data.get.php";

    $url = "../data/users.json";
    $users = get_user($url);

    $username = $_POST['uname'];
    $password = $_POST['pass'];

    foreach ($users as $user){
        //password_verify($password,$user->password)
        //$password == $user->password
        if($username == $user->username && password_verify($password,$user->password)){
            $_SESSION['user_details'] = $user;
            header("Location: /");
            die();
        }
    }

    header("Location: /views/forms/login.php?uname=".$username);