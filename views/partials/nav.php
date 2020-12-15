<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

   <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        S . E . C
                    </a>
                </li>
                <li>
                    <a href="#">HOME</a>
                </li>
                <li>
                    <a href="#">Register User</a>
                </li>
                <li>
                    <a href="#">User</a>
                </li>
                <li>
                    <a href="#">History</a>
                </li>
                <li>
                    <a href="#">Log out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <!-- <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" aria-hidden="true"></i></a>
                        <h1>Hello</h1>
                    </div>
                </div>
            </div>
        </div> -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div id="page-content-wrapper">
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" aria-hidden="true"></i></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pl-auto" id="navbarNav">
                <ul class="navbar-nav w-100 mr-5">
                    <li class="nav-item ml-auto mr-5">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link text-white" href="#">Register User</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link text-white" href="#">User</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link text-white" href="#">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /#page-content-wrapper -->
        

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>