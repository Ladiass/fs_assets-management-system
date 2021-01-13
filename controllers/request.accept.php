<?php
// setup 
    session_start();
    include "data.get.php";
    $url = "../data/request.json";
    $requests = get_data($url);

// inform
    $id = $_GET["id"];