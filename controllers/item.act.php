<?php   
    session_start();
    include "data.get.php";
    $url = "../data/items.json";
    $items = get_item($url);
    $id = $_POST['id'];

    if($items[$id]->isActive == true){
        $items[$id]->isActive = false;
    }else{
        $items[$id]->isActive = true;
    }

    file_put_contents($url,json_encode($items,JSON_PRETTY_PRINT));