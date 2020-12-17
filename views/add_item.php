<div class="form">
	<link rel="stylesheet" href="/assets/css/add.css">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-center boxxx">

					<form action='/controllers/item.add.php' method="POST" enctype="multipart/form-data" class="box p-5">
						<div class="titlee my-4">
							
							<h1>Add item</h1>
						</div>
						<input type="hidden" name="id" value="<?php echo $id ?>">

						<div class="form-group position-relative add-image">
							<label for="image-input" class="btn-image-input position-absolute d-flex align-items-center justify-content-center" id="img_show"><p>Image</p></label>
							<!-- <img src="<?php echo $product->image ?>" class="d-block img-fluid"> -->
							<input type="file" name="image" class="form-control v-hidden" id="image-input">
							<input type="hidden" name="current_image" class="form-control" value="<?php echo $product->image ?>">
						</div>

						<div class="form-group">
							<label>Item Name</label>
							<input type="text" name="item_name" placeholder="Item Name" class="form-control" value="<?php echo $product->name ?>">
						</div>
						
						<div class="form-group">
							<label>quantity</label>
							<input type="number" name="code" placeholder="code123" class="form-control" min="1" value="<?php echo $product->quantity ?>">
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea rows="5" name="description" placeholder="Description" class="form-control"><?php echo $product->description ?></textarea>
						</div>

						<div class="d-flex align-items-center justify-content-center">
							<input type="button" id="bar-close-form" class="btn btn-warning m-2" value="Cancel">
							<input type="submit" value="Add" class="btn btn-success m-2">
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
		// $("#image-input").change(()=>{

		// 	let img_name = $("#image-input").val().split('C:\\fakepath\\');
		// 	$.post("/controllers/img_change.php",{
		// 		img_name : img_name
		// 	},function(data,status){
		// 		$("#img_show").attr("src") = data
		// 	})
		// });
    </script>
</div