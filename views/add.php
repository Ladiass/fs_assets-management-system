<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form method="POST" action='/controllers/process_update_product.php' enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $id?>">
						<div class="form-group">
							<label>Item Name</label>
							<input type="text" name="product_name" placeholder="Item-name" class="form-control" value="<?php echo $product->name?>">
						</div>
						<div class="form-group">
							<label>Code</label>
							<input type="number" name="code" placeholder="code123" class="form-control" value="<?php echo $product->code ?>">
						</div>
						<div class="form-group">
							<label name="#image-input">Image</label>
								<!-- <img src="<?php echo $product->image ?>" class="d-block img-fluid"> -->
								<input type="file" name="image" placeholder="Image" class="form-control" id="image-input">
								<input type="hidden" name="current_image" class="form-control" value="<?php echo $product->image ?>">
							</div>
						<div class="form-group">
							<label>Description</label>
							<textarea rows="5" name="description" placeholder="Descrip" class="form-control"><?php echo $product->description ?></textarea>
							</div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		  </div>
		</div>