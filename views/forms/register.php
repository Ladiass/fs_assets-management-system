<?php 
$title = "Login";
function get_content() {
?>

	<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box">
                    <h1>Register</h1>
                    <p class="text-muted"> -Security.Easy.Creative-</p> 
                    <input type="text" name="" placeholder="Fullname" required> 
                    <input type="text" name="" placeholder="Username" required> 
                    <input type="password" name="" placeholder="Password" required> 
                    <input type="password" name="" placeholder="Confirm Password" required> 
                    <a class="forgot text-muted" href="#">Forgot password?</a> 
                    <input type="submit" name="" value="Register!" href="#">
                </form>
            </div>
        </div>
    </div>
</div>


<?php 
	}
	require_once '../partials/layout.php';
?>