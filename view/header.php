<!-- Logo Header -->
<div class="logo-header">

    <a href="#" class="logo p-2 ">
       
        <img src="../assets/img/1.png" alt="navbar brand" class="navbar-brand" width="15%"> <b class="text-white text-center">PEMINJAMAN</b>
        <!-- <img src="../assets/img/logoazzara2.svg" alt="navbar brand" class="navbar-brand"> -->
        <!-- <img src="../assets/img/IOTech_logo.png" alt="navbar brand" class="navbar-brand" width="60%"> -->
        <!-- <h1 class="navbar-brand" style="color: white; align-self: center">SKYLOVER</h1> -->
    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fa fa-bars"></i>
        </span>
    </button>
    <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
    <div class="navbar-minimize">
        <button class="btn btn-minimize btn-rounded">
            <i class="fa fa-bars"></i> 
        </button>
    </div>
</div>
<!-- End Logo Header -->

<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg">

    <div class="container-fluid">

        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            <!-- avatar -->
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="../assets/img/golangs.png" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg"><img src="../assets/img/profiles.jpg" alt="image profile" class="avatar-img rounded"></div>
                            <div class="u-text">
                                <h4><?php echo $_SESSION['nama']; ?></h4>
                                <p class="text-muted"><?php echo $_SESSION['username']; ?></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <!-- <a class="dropdown-item" href="#">My Profile</a> -->
                        <a class="dropdown-item" href="../passwd">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
<!-- End Navbar -->