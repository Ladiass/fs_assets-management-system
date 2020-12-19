<!-- <script>
    $.post("/controllers/item.brr.php",{
        id : id
    });
</script> -->


<div class="form">
    <?php
        $id = $_POST["id"];
    ?>
    <link rel="stylesheet" href="/assets/css/borrow.css">


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <form class="box p-5" action="/controllers/item.brr.php" method="POST">
                        <div class="titlee">
                            <h1>Borrow</h1>
                        </div>

                        <p class="text-muted" ><?php echo $items[$id]->item_name?></p>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="number" name="brr_count" placeholder="How much you want to Borrow?" required min="1">

                        <div class="row">
                            <input type="button" value="Cancel" class="btn btn-success" id="bar-close-form">
                            <input type="submit" value="Borrow!" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#bar-close-form").click(()=>{
            setTimeout(()=>{
                $("#form-page .form").remove();
            },100)
        });
    </script>
</div>
