<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<script src="/assets/js/nav.js" defer></script>


   <div id="wrapper" class="toggled this-nav">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="">
            <ul class="sidebar-nav text-center overflowx-hidden">
                <li class="sidebar-brand row justify-content-between">
                    <a href="/">
                        S . E . C
                    </a>
                    <a href="javascript:;" id="bar-close" class="justify-self-right"><i class="fa fa-times mr-5" aria-hidden="true" ></i> </a>
                </li>
                <li>
                    <a href="/">HOME</a>
                </li>
                <?php 
                    if(isset($_SESSION["user_details"] )&& $_SESSION["user_details"]->isAdmin){

                ?>
                <li>
                    <a href="javascript:;" id="reg-btn">Register</a>
                </li>
                <li>
                    <a href="/views/user.php">User</a>
                </li>
                <li>
                    <a href="#">History</a>
                </li>
                <?php }?>
                <?php
                    if(!isset($_SESSION["user_details"])){
                ?>
                <li>
                    <a href="javascript:;" id="lgn-btn">Log In</a>
                </li>
                        <?php
                    }else{
                ?>
                <li>
                    <a href="/controllers/system.logout.php">Log Out</a>
                </li>
                <?php }?>
            </ul>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light ">
            <div id="page-content-wrapper">
                <a href="javascript:;" class="btn btn-default btn-bar" id="menu-toggle"><i class="fa fa-align-justify" aria-hidden="true"></i></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pl-auto" id="navbarNav">
            </div>
        </nav>
        <!-- /#page-content-wrapper -->


    </div>