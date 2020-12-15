<?php 
$title = "Login";
function get_content() {
?>

	<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" action="" method="/controllers/system.login.php">
                    <h1>Register</h1>
                    <p class="text-muted"> -Security.Easy.Creative-</p> 
                    <input type="text" name="" placeholder="Username" required> 
                    <input type="password" name="" placeholder="Password" required>  
                    <small><a class="forgot text-muted" href="#">Forgot password?</a> </small>
                    <input type="submit" name="" value="Sign in!">
                </form>
            </div>
        </div>
    </div>
</div>


<?php 
	}
	require_once '../partials/layout.php';
?>