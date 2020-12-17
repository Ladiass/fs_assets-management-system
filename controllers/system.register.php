<?php
session_start();
include "data.get.php";
$url = "../data/users.json";
$users = get_user($url);

$uName = $_POST["runame"];
$uEmail = $_POST["ruemail"];

$new_user = true;
foreach ($users as $user) {
    if ($uName == $user->username && $uEmail == $user->email) {
        $new_user = false;
        break;
    }
}

if ($new_user) {
    $nuser = new stdClass();
    $nuser->username = $uName;
    $nuser->password = password_hash($uName,PASSWORD_DEFAULT);
    $nuser->email = $uEmail;
    $nuser->isAdmin = false;

    $users[] = $nuser;
    file_put_contents($url, json_encode($users, JSON_PRETTY_PRINT));
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    die();
}

$_SESSION["alert"] = "Username : $uName . This Usename is already purely on ! Pls try another username";
header("Location: " . $_SERVER["HTTP_REFERER"]);
