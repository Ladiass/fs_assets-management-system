<?php
    require_once "controllers/data.get.php";

    // session_start();
    $title = "Home";

    if(!isset($_COOKIE["welcome"])){
        header("Location: /views/forms/welcome.php");
        die();
    }
    
    function get_content(){
    $items = get_item("data/items.json");
        ?>

    <div class="container py-5">
    <div class="table-responsive-sm">
        <table class="table table-hover text-center">
            <thead>
                <tr class="bg-dark">
                    <td class="text-white">Index</td>
                    <!-- <td class="text-white">Code</td> -->
                    <td class="text-white">Item Name</td>
                    <td class="text-white">Quantity</td>
                    <td class="text-white">Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                // foreach($items as $i => $asset){
                    // if(!$asset->isActive){
                    //     array_push($items,$asset);
                    //     array_splice($items , $i , 1);  
                    // }
                // sort($items);
                $cc = 0;
                foreach($items as $i => $asset): 
                    $cc++;
                ?>
                    <tr >
                        <td class="align-middle" style="border: none;"><?php echo $cc; ?></td>
                        <!-- <td class="align-middle"><?php echo $asset->code; ?></td> -->
                        <td class="align-middle d-flex align-items-center " style="border: none;">
                            <div style="width: 50px;">
                                <img src="<?php echo $asset->image ?>" alt="" width="100%" class="p-2">
                            </div>
                            <?php echo $asset->name; ?>
                        </td>
                        <td class="align-middle" style="border: none;"><?php echo $asset->quantity; ?></td>
                        <td class="" style="border: none;">
                        <?php if(isset($_SESSION['user_details'])){?>

                            <div class="d-flex align-items-center justify-content-end">
                                <?php
                                    if(!$_SESSION['user_details']->isAdmin ){
                                ?>
                                <div class="d-flex align-items-center">
                                    <p class="align-middle mx-1 px-3 py-2 bg-<?php $asset->isActive ? print("success\"disabled=\"disabled\"") : print("danger text-white \"disabled=\"disabled\"") ?>">
                                        <?php $asset->isActive ? print("Active") : print("Inactive") ;?>
                                    </p>
                                    <a href="javascript:;" class="btn btn-primary mx-1 px-3" id="brr-btn" value="<?php echo $i ?>" <?php
                                        if(!$asset->isActive) echo "disabled"
                                    ?>>Borrow</a>
                                </div>
                                <?php
                                    }else{
                                        if(!$asset->isActive){
                                        ?>
                                        <div>
                                            <a class="btn btn-success px-3 mx-1" id="active_btn" value="<?php echo $i ?>" <?php if($asset->quantity < 1 ) echo "disabled"?> >Active</a>
                                            <?php
                                            }else{?>
                                            <a class="btn btn-warning px-3 mx-1" id="active_btn" value="<?php echo $i ?>">unActive</a>
                                            <?php
                                            }?>
                                            <a class="btn btn-warning px-3 mx-1" id="edit_btn" value="<?php echo $i ?>">Edit</a>
                                            <a href="/controllers/item.rm.php?id=<?php echo $i ?>" class="btn btn-danger px-3 mx-1">Delete</a>
                                        </div>
                                <?php
                                }
                            ?>
                            </div>
                        <?php }?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <?php
                if($_SESSION['user_details']->isAdmin){
            ?>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right" >
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