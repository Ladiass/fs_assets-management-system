<?php 
    $title = "Request"; 

    function get_content(){
        include "../controllers/data.get.php";
        $users = get_data("../data/borrow.json");
        ?>
        <link rel="stylesheet" href="/assets/css/request.css">
    <div class="container py-5">
    <div class="table-responsive-sm">
        <table class="table table-hover text-center">
            <thead>
                <tr class="bg-dark">
                    <td class="text-white">Borrow/Return</td>
                    <td class="text-white">User</td>
                    <td class="text-white">Request Item</td>
                    <td class="text-white">Borrow time</td>
                    <td class="text-white">Number</td>
                    <td class="text-white">Actions</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($users as $i=>$user) {?>
                        <td class="align-middle">
                            <p class="bg-<?php $user->return ? print("success"):print("primary"); ?> ">
                                <?php $user->return ? print("Borrow"): print("Return"); ?>
                            </p>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="user_img mr-3">
                                    <img src="<?php echo $user->picture ?>" alt="" width="100%">
                                </div>
                                <?php echo $user->borrower ?>
                            </div>
                        </td>

                        <td class="align-middle"> 
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="user_img mr-3">
                                    <img src="<?php echo $user->image ?>" alt="" width="100%">
                                </div>
                                <?php echo $user->itemname ?>
                            </div>
                        </td>
                        
                        <td class="align-middle"><?php echo $user->returntime ?></td>

                        <td class="align-middle"><?php echo $user->count ?></td>

                        <td class="align-middle">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="/controllers/request.accept.php?id=<?php echo $i ?>" class="btn btn-success mx-2">Accept</a>
                                <a href="/controllers/request.reject.php?id=<?php echo $i ?>" class="btn btn-danger mx-2">Reject</a>
                                <?php if(isset($_SESSION['user_details']) && $user->borrower == $_SESSION["user_details"]->username){ ?>
                                    <a href="/controllers/request.cancel.php?id=<?php echo $i ?>" class="btn btn-warning">Cancel</a>
                                <?php } ?>
                            </div>
                        </td>
                    
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<?php 
    }
    include "partials/layout.php";