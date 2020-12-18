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
                foreach($items as $i => $asset): 
                ?>
                    <tr >
                        <td class="align-middle"><?php echo $i+1; ?></td>
                        <td class="align-middle"><?php echo $asset->code; ?></td>
                        <td class="align-middle d-flex align-items-center">
                            <div style="width: 50px;">
                                <img src="<?php echo $asset->image ?>" alt="" width="100%" class="p-2">
                            </div>
                            <?php echo $asset->name; ?>
                        </td>
                        <td class="align-middle"><?php echo $asset->quantity; ?></td>
                        <td class="">
                            <div class="row justify-content-around align-items-center">
                                <?php
                                    if(!$_SESSION['user_details']->isAdmin){
                                ?>
                                <p class="px-3 py-2 bg-<?php $asset->isActive ? print("success\"disabled=\"disabled\"") : print("danger text-white \"disabled=\"disabled\"") ?>">
                                    <?php $asset->isActive ? print("Active") : print("Inactive") ;?>
                                </p>
                                <a href="javascript:;" class="btn btn-primary" id="brr-btn" value="<?php echo $i ?>">Borrow</a>
                                <!-- <form action="" class="">
                                    <button class="btn btn-primary">Borrow</button>
                                </form> -->
                                <?php
                                    }else{
                                        if(!$asset->isActive){
                                        ?>
                                        <a class="btn btn-success " id="active_btn" value="<?php echo $i ?>">Active</a>
                                        <?php
                                        }else{?>
                                        <a class="btn btn-warning " id="active_btn" value="<?php echo $i ?>">unActive</a>
                                         <?php
                                        }?>
                                        <a class="btn btn-warning " id="edit_btn" value="<?php echo $i ?>">Edit</a>
                                        <a href="/controllers/item.rm.php?id=<?php echo $i ?>" class="btn btn-danger ">Delete</a>
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