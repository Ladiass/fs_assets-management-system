<?php
    session_start();
    include "data.get.php";

    $url = "../data/items.json";
    $items = get_item("");

    