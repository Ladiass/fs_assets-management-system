<?php
    session_start();
    include "data.get.php";
    $url = "../data/items.json";
    $items = get_item($url);
    $history = get_history("../data/borrow.json");
    
    $id = $_GET['id'];
    $hv_items = false;
    date_default_timezone_set("Asia/Kuala_Lumpur");
    foreach($items as $i =>$item){
        if($item->name == $history[$id]->itemname){
            $item->quantity += $history[$id]->count;
            $history[$id]->return = true;
            $history[$id]->returntime =date("Y - n - j (His)");
            $item->isActive = true ;
            $hv_items = true;
            break;
        }
    }
    if(!$hv_items){
            // $item->quantity += $history[$id]->count;
            $history[$id]->return = true;
            $history[$id]->item_close = true;
            $history[$id]->returntime = date("Y - n - j (His)");
            // $item->isActive = true ;
    }
    file_put_contents($url, json_encode($items , JSON_PRETTY_PRINT));
    file_put_contents("../data/borrow.json", json_encode($history , JSON_PRETTY_PRINT));
    
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    
    
