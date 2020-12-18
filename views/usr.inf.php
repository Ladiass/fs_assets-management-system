<?php
    session_start();
    $title =    ucfirst($_SESSION["user_details"]->username);
    // if(strtolower($_SESSION["user_details"]->username) == strtolower("admin")){
    //     header("Location: /");
    // }
    function get_content(){
        $id =$_GET["id"];
        include "../controllers/data.get.php";
        $url = "../data/users.json";
        $users = get_user($url);
?>
<div class="container bcontent" style="margin-top: 100px;">
        <div class="card">
          <div class="card-body bg-dark text-white">
            Profile
            <a class="float-right btn btn-success" href="/views/usr.ed.php"><small class="font-weight-bold">Edit</small></a>
          </div>
        </div>
        <div class="card">
          <div class="card-body row">
                <div class="col-sm-3">
                    <label for="user_image" class="rounded-circle" style="overflow: hidden;cursor: pointer;">
                        <img  src="<?php echo $_SESSION['user_details']->picture ?>" alt="
                        <?php echo $_SESSION["user_details"]->username?>" width="100%" >
                    </label>
                    <input type="file" id="user_image" class="v-hidden" height="1px">
                </div>
                <div class="col-sm-9">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <h5 class="card-title">Name :</h5>
                            <p class="ml-5 pt-4"><?php echo $_SESSION["user_details"]->fullname?></p>
                        </div>
                        <div class="row align-items-center">
                            <h5 class="card-title">Username :</h5>
                            <p class="ml-5 pt-4"><?php echo $_SESSION["user_details"]->username?></p>
                        </div>
                        <div class="row align-items-center">
                            <h5 class="card-title">Email :</h5>
                            <p class="ml-5 pt-4"><?php echo $_SESSION["user_details"]->email?></p>
                        </div>
                        <!-- <a href="#" class="btn btn-primary">Edit</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    }
    include "partials/layout.php";