<?php
    session_start();
    include "data.get.php";
    $url = "../data/items.json";
    $items = get_item($url);
    $history = get_history("../data/borrow.json");
    $id = $_POST['id'];
    $brr_count = $_POST["brr_count"];
    date_default_timezone_set("Asia/Kuala_Lumpur");
    if($items[$id]->quantity >= $brr_count && $brr_count != 0){
        $items[$id]->quantity -= $brr_count;

        $newhistory = new stdClass();
        $newhistory->itemname = $items[$id]->name;
        $newhistory->count = $brr_count;
        $newhistory->time = date("Y - n - j (H:i:s)");
        $newhistory->image = $items[$id]->image;
        $newhistory->borrower = $_SESSION["user_details"]->username;
        $newhistory->return = false;

        $history[] = $newhistory;

        file_put_contents($url, json_encode($items , JSON_PRETTY_PRINT));
        file_put_contents("../data/borrow.json", json_encode($history , JSON_PRETTY_PRINT));

        if($items["$id"]->quantity == 0){
            $items["$id"]->isActive == false;
        }
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
    
