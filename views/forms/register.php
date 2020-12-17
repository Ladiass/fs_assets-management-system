<div class="form">

    <link rel="stylesheet" type="text/css" href="/assets/css/register.css">


        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <form class="box p-5" action="/controllers/system.register.php" method="POST">
                            <div class="titlee">
                            <a href="javascript:;" id="bar-close-form" class="position-absolute "><i class="fa fa-times mr-5" aria-hidden="true" ></i></a>
                                <h1>Register</h1>
                            </div>
                            <p class="text-muted"> -Security.Easy.Creative-</p>
                            <input type="text" name="runame" placeholder="Username" required>
                            <input type="email" name="ruemail" placeholder="Email" required>
                            <input type="submit" value="Register">
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
