<?php
    session_start();
    include "data.get.php";

    $url = "../data/users.json";
    $users = get_user($url);

    $username = $_POST['uname'];
    $password = $_POST['pass'];

    
    foreach ($users as $user){
        //
        if($user->username == $username && password_verify($password,$user->password)){
            $_SESSION['user_details'] = $user;
            header("Location: /");
        }else{
            header("Location: /views/forms/login.php"."?uname=".$username);
        }
    }
