<?php
    session_start();
    $title =    ucfirst($_SESSION["user_details"]->username);
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
            Profile
            <a class="float-right btn btn-success" href="/views/usr.ed.php"><small class="font-weight-bold">Edit</small></a>
          </div>
        </div>
        <div class="card">
          <div class="card-body row">
                <div class="col-sm-3">
                    <label for="user_image" class="text-dark bg-white" style="overflow: hidden;cursor: pointer;border-radius:50%; border:1px solid; max-height:250px;position:relative">
                        <img id="user_picture" src="<?php echo $_SESSION['user_details']->picture ?>" alt="
                        <?php echo $_SESSION["user_details"]->username?>" width="100%" >
                    </label>
                    <input type="file" id="user_image" class="v-hidden" height="1px">
                </div>
                <div class="col-sm-9">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <h5 class="card-title text-dark">Name :</h5>
                            <p class="ml-5 pt-4 text-dark"><?php echo $_SESSION["user_details"]->fullname?></p>
                        </div>
                        <div class="row align-items-center">
                            <h5 class="card-title text-dark">Username :</h5>
                            <p class="ml-5 pt-4 text-dark"><?php echo $_SESSION["user_details"]->username?></p>
                        </div>
                        <div class="row align-items-center">
                            <h5 class="card-title text-dark">Email :</h5>
                            <p class="ml-5 pt-4 text-dark"><?php echo $_SESSION["user_details"]->email?></p>
                        </div>
                        <?php
                            if(isset($_SESSION['user_details'])){
                                ?>
                                <div class="row align-items-center">
                                    <h5 class="card-title text-dark">Password :</h5>
                                    <p class="ml-5 pt-4 text-dark"><?php echo "*******"?></p>
                                </div>
                                <?php
                            }
                        ?>
                        <!-- <a href="#" class="btn btn-primary">Edit</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#user_image").on("change",()=>{
            let	newData = new FormData();
            let files = $("#user_image")[0].files[0];
            newData.append("image",files);

            $.ajax({
            url:"/controllers/user.picture.php",
            type : "POST",
            data : newData,
            contentType:false,
            processData:false,
            success:function(response){
            if(response != 0){
                // ev.preventDefault();
                // console.log(response);
                // $("#user_picture").attr("src", response);
                location.reload();
                $("#user_picture").show();
                // $(".img__text").hide();
            }else{
                alert("File not uploaded");
            }
        }
    })
        })
    </script>
<?php 
    }
    include "partials/layout.php";