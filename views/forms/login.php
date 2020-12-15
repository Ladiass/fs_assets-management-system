<?php 
session_start();
$title = "Login";
if(isset($_SESSION['user_details'])){
    header("Location: /");
}
function get_content() {
?>

	<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box p-4" action="/controllers/system.login.php" method="POST">
                    <h1>Login</h1>
                    <p class="text-muted"> -Security.Easy.Creative-</p> 
                    <input type="text" name="uname" placeholder="Username" required value="<?php echo $_GET['uname']?>"> 
                    <input type="password" name="pass" placeholder="Password" required>
                    <small><a class="forgot  text-primary font-weight-bold" href="#">Forgot password?</a> </small>
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