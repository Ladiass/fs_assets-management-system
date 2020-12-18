<?php
    session_start();

    // $img_name = $_FILES['image']['name'];
    $new_image = false;
    if(!empty($_FILES['image']["tmp_name"])){
        // echo "test";
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $img_tmpname = $_FILES['image']['tmp_name'];
    $location ="/assets/img/cookie-img/".$img_name;

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
            move_uploaded_file($img_tmpname,"../assets/img/cookie-img/".$img_name);
            echo($location);
        }


// $filename = $_FILES['image']['name'];
// $location ="cookie-img/".$img_name;
// $upload = 1;

// $img_type = pathinfo($location,PATHINFO_EXTENSION);

// $valid_extensions = array("jpg","jpeg","png","gif","svg");

// if(!in_array(strtolower($img_type),$valid_extensions)){
//     $upload = 0;
// }

// if($upload == 0){
//     echo 0;
// }else{
//     if(move_uploaded_file($_FILES['file']["tmp_name"],$location )){
//         echo $location;
//     }else{
//         echo 0;
//     }
// }

