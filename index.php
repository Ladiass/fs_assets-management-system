<?php
    require_once "controllers/data.get.php";

    // session_start();
    $title = "Home";

    if(!isset($_COOKIE["welcome"])){
        header("Location: /views/forms/welcome.php");
        die();
    }
    // if(!isset($_SESSION["user_details"])){
    //     header("Location: /views/forms/login.php");
    //     die();
    // }
    function get_content(){
    $items = get_item("data/items.json");
        ?>

    <div class="container py-5">
    <div class="table-responsive-sm">
        <table class="table table-hover text-center">
            <thead>
                <tr class="bg-dark">
                    <td class="text-white">Index</td>
                    <td class="text-white">Code</td>
                    <td class="text-white">Item Name</td>
                    <td class="text-white">Quantity</td>
                    <td class="text-white">Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                // $count = 0 ;
                foreach($items as $i => $asset): 
                ?>
                    <tr >
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $asset->code; ?></td>
                        <td><?php echo $asset->name; ?></td>
                        <td><?php echo $asset->quantity; ?></td>
                        <td>
                            <div class="row justify-content-around">
                                <?php
                                    if(!$_SESSION['user_details']->isAdmin){
                                ?>
                                <a class="btn btn-<?php $asset->isActive ? print("success\"disabled=\"disabled\"") : print("secondary\"disabled=\"disabled\"") ?>">
                                    <?php $asset->isActive ? print("Active") : print("Inactive") ;?>
                                </a>
                                <a href="javascript:;" class="btn btn-primary" id="brr-btn" value="<?php echo $i ?>">Borrow</a>
                                <!-- <form action="" class="">
                                    <button class="btn btn-primary">Borrow</button>
                                </form> -->
                                <?php
                                    }else{
                                        if(!$asset->isActive){
                                        ?>
                                        <a class="btn btn-success mb-2 mb-md-0" id="active_btn" value="<?php echo $i ?>">Active</a>
                                        <?php
                                        }else{?>
                                        <a class="btn btn-warning mb-2 mb-md-0" id="active_btn" value="<?php echo $i ?>">unActive</a>
                                         <?php
                                        }?>
                                        <a class="btn btn-warning mb-2 mb-md-0" id="edit_btn" value="<?php echo $i ?>">Edit</a>
                                        <a href="/controllers/item.rm.php?id=<?php echo $i ?>" class="btn btn-danger mb-2 mb-md-0">Delete</a>
                                <?php
                                }
                            ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <?php
                if($_SESSION['user_details']->isAdmin){
            ?>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <a class="btn btn-primary" id="add-btn">Add</a>
                    </td>
                </tr>
            </tfoot>
            <?php
                }
            ?>
        </table>
    </div>
</div>
<?php 
    }
    include "views/partials/layout.php";