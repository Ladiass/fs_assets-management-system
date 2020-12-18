<?php
    session_start();
    include "data.get.php";
    $url = "../data/items.json";
    $items = get_item($url);
    $id = $_POST['id'];
    
    $item_name = htmlspecialchars($_POST['item_name']);
    $code = htmlspecialchars($_POST['code']);
    $desc = htmlspecialchars($_POST['description']);

    $has_details = false;
    $new_image = false;

    if(!empty($_FILES['image']["tmp_name"])){
        // echo "test";

        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $img_tmpname = $_FILES['image']['tmp_name'];
        $img_type = pathinfo($img_name,PATHINFO_EXTENSION);
        if($img_type == "jpg" || $img_type == "svg" ||$img_type == "jpeg" || $img_type == "png" ||$img_type == "gif"){
            $new_image = true;
            // echo "1";
        }else{
            echo "Please upload an image file";
            die();
        }
    }

    //pathinfo() is a method that returns information about a file path
    
    // echo "2";
    
    if(strlen($item_name) > 0 && intval($code) > 0  && strlen($desc) > 0){
        $has_details = true;
        // echo "3";
    }
    // echo "4";
    // print_r ($items[$id]);
    
    if($has_details){
        // echo "5";
        $items[$id]->name = $item_name;
        $items[$id]->code = $code;
        $items[$id]->description =$desc;
        if($new_image && $img_size > 0){
            $items[$id]->image = "/assets/img/".$img_name;
            move_uploaded_file($img_tmpname,"../assets/img/".$img_name);
        // echo "6";
        }

        file_put_contents($url ,json_encode($items,JSON_PRETTY_PRINT) );

        // $_SESSION['class'] = "primary";
        // $_SESSION['message'] = "Product: <span class='text-success'>$products_name</span> is updated!";
        
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }