<?php
    session_start();
    $title = "Edit";
    if(strtolower($_SESSION["user_details"]->username) == strtolower("admin")){
        header("Location: /");
    }
    function get_content(){
        $id =$_GET["id"];
        include "../controllers/data.get.php";
        $url = "../data/users.json";
        $users = get_user($url);
?>
<div class="container bcontent" style="margin-top: 100px;">
        <div class="card">
          <div class="card-body bg-dark text-white">
            Edit Profile
          </div>
        </div>
        <div class="card">
          <div class="card-body row">
                <div class="col-sm-3">
                    <label for="user_image" class="rounded-circle" style="overflow: hidden;" >
                        <img  src="<?php echo $_SESSION['user_details']->picture ?>" alt="
                        <?php echo $_SESSION["user_details"]->username?>" width="100%" >
                    </label>
                    <input type="file" id="user_image" class="v-hidden" height="1px" disabled>
                </div>
                <div class="col-sm-9">
                    <div class="card-body">
                        <form action="/controllers/user.ed.php" method="POST">
                            <div class="row align-items-center">
                                <h5 class="card-title">Name :</h5>
                                <input type="text" required value="<?php echo $_SESSION["user_details"]->fullname?>" class="form-control" name="fullname">
                            </div>
                            <div class="row align-items-center">
                                <h5 class="card-title">Username :</h5>
                                <input type="hidden" value="<?php echo $_SESSION["user_details"]->username?>" name="username">
                                <input type="text" value="<?php echo $_SESSION["user_details"]->username?>" class="form-control"  disabled >
                            </div>
                            <div class="row align-items-center">
                                <h5 class="card-title">Email :</h5>
                                <input type="email" value="<?php echo $_SESSION["user_details"]->email?>" name="email" required class="form-control">
                            </div>
                            <?php
                            if(isset($_SESSION['user_details'])){
                                ?>
                                <div class="row align-items-center">
                                    <h5 class="card-title">Password :</h5>
                                    <input type="password" name="password" required class="form-control">
                                </div>
                                <?php
                            }
                        ?>
                            <!-- <a href="#" class="btn btn-primary">Edit</a> -->
                            <div class="button-load py-5">
                                <a href="/views/usr.inf.php" class="btn btn-warning">Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Done">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    }
    include "partials/layout.php";