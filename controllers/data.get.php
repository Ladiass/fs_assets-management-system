<?php 

function get_user($url){
    $users = json_decode(file_get_contents($url));
    return $users;
};

function get_item($url){
    $items = json_decode(file_get_contents($url));
    return $items;
};
function get_borrows($url){
    $borrows = json_decode(file_get_contents($url));
    return $borrows;
};