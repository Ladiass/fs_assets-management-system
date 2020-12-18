<?php
    include "data.get.php";

    $id = $_GET['id'];
    $url = "../data/users.json";
    $user_name = $users[$id]->username;
    $users = get_user($url);

    if($users[$id]->isAdmin){
        $users[$id]->isAdmin = false;
    }else{
        $users[$id]->isAdmin = true;
    }

    file_put_contents($url, json_encode($users,JSON_PRETTY_PRINT));
    header("Location: ".$_SERVER["HTTP_REFERER"]);