<?php
$title = "Users";
    function get_content(){
        include "../controllers/data.get.php";
        $url = "../data/users.json";
        $users = get_user($url);

?>
<div class="container py-5">
    <div class="table-responsive-sm">
        <table class="table table-hover text-center">
            <thead>
                <tr class="bg-dark">
                    <td class="text-white">Index</td>
                    <td class="text-white">Username</td>
                    <td class="text-white">Full Name</td>
                    <td class="text-white">email</td>
                    <td class="text-white">Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($users as $i => $asset): 
                        if(strtolower($asset->username) == strtolower("admin")) continue;
                ?>
                    <tr >
                        <td class="align-middle"><?php echo $i; ?></td>
                        <td class="align-middle"><?php echo $asset->username; ?></td>
                        <td class="align-middle d-flex align-items-center">
                            <div style="width: 50px;">
                                <img src="<?php echo $asset->picture ?>" alt="" width="100%" class="p-2" style="border-radius:50%;">
                            </div>
                            <?php echo $asset->fullname ?>
                        </td>
                        <td class="align-middle"><?php echo $asset->email ?></td>
                        <td>
                            <a class="btn btn-<?php 
                            if($asset->isAdmin){
                                echo "secondary";
                            }else{
                                echo "success";
                            }
                            ?>"  value="<?php echo $i?>" href="/controllers/user.adm.php?id=<?php echo $i?>"><?php 
                                if($asset->isAdmin){
                                    echo "unAdmin";
                                }else{
                                    echo "Admin";
                                }
                            ?></a>
                            <a class="btn btn-danger" id="user-del" href="/controllers/user.del.php?id=<?php echo $i?>">Remove</a>
                            <!-- <a class="btn btn-danger"  id="user-brr">Borrow</a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
    }
    include "partials/layout.php";