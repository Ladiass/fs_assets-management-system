<?php
    session_start();
    include "data.get.php";

    $url = "../data/items.json";
    $items = get_item($url);
    $id = $_GET['id'];

    array_splice($items,$id,1);

    file_put_contents($url,json_encode($items,JSON_PRETTY_PRINT));

    header("Location: /");