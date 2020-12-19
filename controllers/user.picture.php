<?php 
    session_start();
    include "data.get.php";
    $url = "../data/users.json";
    $users = get_user($url);
    $new_image = false;
    if(!empty($_FILES['image']["tmp_name"])){
        // echo "test";
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $img_tmpname = $_FILES['image']['tmp_name'];
        $location ="/assets/img/users/".$img_name;

        $img_type = pathinfo($img_name,PATHINFO_EXTENSION);
        if($img_type == "jpg" || $img_type == "svg" ||$img_type == "jpeg" || $img_type == "png" ||$img_type == "gif"){
            $new_image = true;
            // echo "1";
        }else{
            // echo "Please upload an image file";
            // die();
        }
    }else{
        echo 0;
    }
    if($new_image && $img_size > 0){
        foreach($users as $i => $user){
            if($user->username == $_SESSION['user_details']->username){
                $users[$i]->picture = $location ;
                file_put_contents($url,json_encode($users,JSON_PRETTY_PRINT));
                $_SESSION["user_details"] = $user;
                print_r($users[$i]->picture);
                break;
            }
        }
        move_uploaded_file($img_tmpname,"../assets/img/users/".$img_name);
        echo($location);
    }