<?php
    session_start();
    include "data.get.php";
    $url = "../data/items.json";
    $items = get_item($url);

    $id = $_POST['id'];
    $brr_count = $_POST["brr_count"];

    if($items["$id"]->quantity >= $brr_count){
        $items["$id"]->quantity -= $brr_count;
        file_put_contents($url, json_encode($items , JSON_PRETTY_PRINT));
        if($items["$id"]->quantity == 0){
            $items["$id"]->isActive == false;
        }
    }else{
        echo 0;
    }
    
