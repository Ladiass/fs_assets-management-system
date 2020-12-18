<?php 
    session_start();
    include "../controllers/data.get.php";
    $url = "../data/items.json";
    $items = get_item($url);

    $id = $_POST["id"];
?>

<div class="form">
	<link rel="stylesheet" href="/assets/css/edit.css">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-center boxxx">

					<form action='/controllers/item.ed.php' method="POST" enctype="multipart/form-data" class="box p-5">
						<div class="titlee my-4">
							
							<h1>Add item</h1>
						</div>
						<input type="hidden" name="id" value="<?php echo $id ?>">

						<div class="form-group position-relative add-image">
							<label for="image-input" class="btn-image-input position-absolute d-flex align-items-center justify-content-center" id="img_show">
								<img src="<?php echo $items[$id]->image;?>" alt="" id="cImage">
							</label>


							<input type="file" name="image" class="form-control v-hidden" id="image-input">
						</div>

						<div class="form-group">
							<label>Item Name</label>
							<input type="text" name="item_name" placeholder="Item Name" class="form-control" value="<?php echo $items[$id]->name ?>">
						</div>
						
						<div class="form-group">
							<label>quantity</label>
							<input type="number" name="code" placeholder="code123" class="form-control" min="1" value="<?php echo $items[$id]->quantity ?>">
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea rows="5" name="description" placeholder="Description" class="form-control"><?php echo $items[$id]->description ?></textarea>
						</div>

						<div class="d-flex align-items-center justify-content-center">
						<input type="hidden" name="id" value="<?php echo $id ?>">
							<input type="button" id="bar-close-form" class="btn btn-warning m-2" value="Cancel">
							<input type="submit" value="Done" class="btn btn-success m-2">
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
		$("#image-input").change((ev)=>{
			// ev.preventDefault();
			let	newData = new FormData();
			let files = $("#image-input")[0].files[0];
			newData.append("image",files);

			$.ajax({
				url:"/controllers/img_change.php",
				type : "POST",
				data : newData,
				contentType:false,
				processData:false,
				success:function(response){
					if(response != 0){
						// ev.preventDefault();
						$("#cImage").attr("src",response);
						$("#cImage").show();
						$(".img__text").hide();
					}else{
						alert("File not uploaded");
					}
				}
			})
		});
    </script>
</div>
