<?php 

include 'functions.php';
include 'connection.php';

$userdata = checkLogin($connection);
$status = 'deactivated';

$query = "select  COUNT(activation_request.Pupil_ID) from pupil inner join activation_request on pupil.Pupil_ID = activation_request.Pupil_ID where pupil.status = '$status' ";

$results = mysqli_query($connection, $query);
if(mysqli_num_rows($results)>0){
    $requestCount = mysqli_fetch_row($results);
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Kindercare e-learning system</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/sb-admin-2.min.css"> -->
    <script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" 
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" 
    crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" 
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" 
    crossorigin="anonymous"></script>
</head>

<body>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
   
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>KCEL SYSTEM</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Navigation Menu</p>
                <li class="active">
                    <a href="index.php" data-toggle="collapse" aria-expanded="false" class="">Assignments</a>
                    <ul class="collapse list-unstyled" id="home">
                        
                    </ul>
                </li>
                <li>
                    <a href="results.php">Results</a>
                </li>
                <li>
                    <a href="requests.php">Activations</a>
                </li>
                <li>
                    <a href="accounts.php">Accounts</a>
                </li>
                <li>
                    <a href="Reports.php" data-toggle="collapse" aria-expanded="false" class="">Reports</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                    </ul>
                </li>
                
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="" class="download">KCEL source</a>
                </li>
                <li>
                    <a href="" class="article"></a>
                </li>
            </ul>
        </nav>

         <!-- Page Content  -->
         <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <form class="search d-flex" method="get" >
                    <input class="form-control  small" type="text" placeholder="Search" name="search">
                    <button class="btn btn-primary" type="submit" name="searchbtn"><i class="fas fa-search"></i></button>
                </form>
                    
                    <button class="btn  d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="requests.php" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <div class="hidden" id="notify">
                            <span class="badge badge-danger badge-counter">
                                <?php if($requestCount != null): ?>
                                    <?php if($requestCount[0] != 0): ?>
                                        <?php 
                                            echo "<script>
                                                    document.getElementById('notify').classList.remove('hidden');
                                                </script>";
                                        ?>
                                        <?php echo $requestCount[0] ?>
                                    <?php endif ?>
                                <?php endif ?>
                            </span>
                            </div>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Requests
                            </h6>
                            <a href="" class="dropdown-item d-flex align-items-center">activation request by melissa</a>
                        </div>
                    </div>

                    <div class="dropdown">
                        <a style="margin-left: -80px; text-decoration:none;" class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $userdata['Username']?>
                        </a>
                        <ul style="margin-left: -80px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                        </div>
                </div>
            </nav>
