
<div class="form">

    <link rel="stylesheet" href="/assets/css/login.css">


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <form class="box p-5" action="/controllers/system.login.php" method="POST">
                    <div class="titlee">
                        <a href="javascript:;" id="bar-close-form" class="position-absolute "><i class="fa fa-times mr-5" aria-hidden="true" ></i></a>
                        <h1>Login</h1>
                        </div>
                        <p class="text-muted"> -Security.Easy.Creative-</p>
                        <input type="text" name="uname" placeholder="Username" required>
                        <input type="password" name="pass" placeholder="Password" required>
                        <small><a class="forgot  text-primary font-weight-bold" href="#">Forgot password?</a> </small>
                        <input type="submit" name="" value="Sign in!">
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
