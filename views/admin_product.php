<?php  
	session_start();
	require_once '../controllers/data.get.php';
	$title = "Product Details";
	function get_content() {	
	$products = get_item('../data/items.json');
	$id = $_GET['id'];
	$product = $products[$id];
?>

<div class="container">
	<?php if(isset($_SESSION['message'])): ?>
		<div class="alert alert-<?php echo $_SESSION['class'] ?>">
			<?php echo $_SESSION['message'] ?>
		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card">
				<img src="<?php echo $product->image ?>" class="card-img-top">
				<div class="card-body">
					<a href="/views/product_details.php?id=<?php echo $i ?>">
						<h5 class="card-title"><?php echo $product->name ?></h5>
					</a> 
					<p class="card-text"><?php echo $product->description ?></p>
					<small class="font-weight-bold">RM <?php echo $product->price ?></small>
				</div>

				<?php if(isset($_SESSION['user_details']) && !$_SESSION['user_details']->isAdmin && $product->isActive): ?>
					<div class="card-footer">
						<form method="POST" action="/controllers/add_to_cart.php">
							<input type="hidden" name="id" value="<?php echo $i ?>">
							<div class="input-group">
								<input type="number" name="quantity" class="form-control" min="1" required>
								<div class="input-group-append">
									<button class="btn btn-success">Add to Cart</button>
								</div>
							</div>
						</form>
					</div>
					<?php elseif(!$product->isActive): ?>
						<div class="card-foter text-center">
							Out of stock
						</div>
				<?php endif; ?>

				<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin): ?>
				<a href="/controllers/activate_deactivate.php?id=<?php echo $id ?>" class="btn btn-<?php $product->isActive ? print("secondary") : print("success")?>">
					<?php $product->isActive ? print("Deactivate") : print("Activate")?>
				</a>
				<button class="btn btn-warning" data-toggle="modal" data-target="#editModal">Edit</button>

				<div class="modal fade" id="editModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Product</h5>
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
										<img src="<?php echo $product->image ?>" class="d-block img-fluid">
										<input type="file" name="image" placeholder="Image" class="form-control" value="<?php echo $product->image ?>" id="image-input">
										<input type="hidden" name="current_image" class="form-control" value="<?php echo $product->image ?>">
									</div>
									<div class="form-group">
										<label>Description</label>
										<textarea rows="5" name="description" placeholder="Descrip" class="form-control"><?php echo $product->description ?></textarea>
									</div>
									<button class="btn btn-primary">Submit</button>
								</form>
							</div>
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
					</div>
				</div>

				<button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
				<div class="modal fade" id="deleteModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><?php echo $product->name; ?></h5>
							</div>
							<div class="modal-body">
								<p>Are you sure you want to delete this item?</p>
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<a href="/controllers/process_delete_product.php?id=<?php echo $id ?>" class="btn btn-success">Confirm</a>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>

	<?php 
}
include "partials/layout.php";