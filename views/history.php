<?php
$title = "History";
    function get_content(){
        include "../controllers/data.get.php";
        $url = "../data/borrow.json";
        $borrows = get_borrows($url);

?>
<div class="container py-5">
    <div class="table-responsive-sm">
        <table class="table table-hover text-center">
            <thead>
                <tr class="bg-dark">
                    <td class="text-white">Index</td>
                    <td class="text-white">Item Name</td>
                    <td class="text-white">Time</td>
                    <td class="text-white">How much you borrow?</td>
                        <?php if($_SESSION['user_details']->isAdmin){?>
                    <td class="text-white">Borrower</td>
                                            <?php }?>
                    <td class="text-white">Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($borrows as $i => $asset):
                        if($asset->borrower == $_SESSION["user_details"]->username || $_SESSION["user_details"]->isAdmin){
                ?>
                <form action="/controllers/item.return.php"  method="POST">
                    <tr class="text-center">
                        <td class="align-middle " style="border: none;"><?php echo $i+1; ?></td>
                        <td class="align-middle d-flex align-items-center justify-content-center " style="border: none;">
                            <div style="width: 50px;">
                                <img src="<?php echo $asset->image ?>" alt="" width="100%" class="p-2">
                            </div>    
                            <?php echo $asset->itemname; ?>
                        </td>
                        <td class="align-middle " style="border: none;">
                            <?php echo $asset->time ;
                            if(isset($asset->returntime)){?>
                                <div class="returntime bg-success pt-2">
                                    Return time :<br>
                                    <?php echo $asset->returntime?>
                                </div>

                            <?php }?>
                        </td>
                        <td class="align-middle" style="border: none;"><?php echo $asset->count?></td>
                        <?php if($_SESSION['user_details']->isAdmin){?>
                        <td class="align-middle " style="border: none;"><?php echo $asset->borrower ?></td>
                        <?php }?>
                        <td class="d-flex align-items-center justify-content-center" style="border: none;">
                            <?php if($_SESSION["user_details"]->isAdmin){?>
                            <!-- <a class="btn btn-danger" id="user-del" href="/controllers/user.del.php?id=<?php echo $i?>">Delete</a> -->
                            <!-- <a class="btn btn-danger"  id="user-brr">Borrow</a> -->
                            <?php 
                            }
                                if($asset->borrower == $_SESSION["user_details"]->username && !$asset->return){
                            ?>
                                <a class="btn btn-danger" id="user-del" href="/controllers/item.return.php?id=<?php echo $i?>">Return</a>
                            <?php }
                                if($asset->return){
                            ?>
                                <p class="px-3 py-2 bg-success w-100" disabled="disabled ">Returned</p>
                                <?php 
                                }else{
                                if($_SESSION["user_details"]->isAdmin){?>
                                    <p class="px-3 py-2 bg-danger w-100" disabled="disabled ">Not yet</p>
                                <?php }}?>
                        </td>
                    </tr>
                </form>
                <?php }; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
    }
    include "partials/layout.php";