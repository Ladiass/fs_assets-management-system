<?php
    session_start();
    include "data.get.php";

    $id = $_GET['id'];
    $url = "../data/users.json";
    $user_name = $users[$id]->username;
    $users = get_user($url);
    array_splice($users, $id , 1);

    file_put_contents($url, json_encode($users,JSON_PRETTY_PRINT));
    header("Location: ".$_SERVER["HTTP_REFERER"]);