<?php   
    session_start();
    include "data.get.php";
    $url = "../data/items.json";
    $items = get_item($url);
    $id = $_POST['id'];

    if($items[$id]->isActive == true){
        $items[$id]->isActive = false;
        echo 0;
    }else{
        $items[$id]->isActive = true;
        echo 1;
    }

    file_put_contents($url,json_encode($items,JSON_PRETTY_PRINT));