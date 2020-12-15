<?php
    $title = "Home";
    function get_content(){
        ?>
    
    <div class="container py-5">
    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Index</td>
                    <td>Code</td>
                    <td>Item Name</td>
                    <td>Quantity</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($assets as $i => $asset): ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $asset->name; ?></td>
                        <td><?php echo $asset->category; ?></td>
                        <td><?php echo $asset->quantity; ?></td>
                        <td>
                            <div class="row justify-content-around">
                                <a href="/controllers/asset_process/asset_isActive_process.php?id=<?php echo $i ?>" class="btn btn-<?php $asset->isActive ? print("success") : print("secondary") ?>">
                                    <?php $asset->isActive ? print("Active") : print("Inactive") ?>
                                </a>
                                <a href="/views/forms/edit_asset.php?id=<?php echo $i ?>" class="btn btn-warning mb-2 mb-md-0">Edit</a>
                                <a href="/controllers/asset_process/asset_delete_process.php?id=<?php echo $i ?>" class="btn btn-danger mb-2 mb-md-0">Delete</a>
                                <form action="" class="">
                                    <button class="btn btn-primary">Borrow</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="/views/forms/add_asset.php" class="btn btn-primary">Add</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php 
    }
    include "views/partials/layout.php";