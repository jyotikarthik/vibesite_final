<?php

include "../pages/db_conn.php";

#to display reported user
$select = "SELECT * FROM report";
$result = mysqli_query($conn, $select);
/*if(isset($_POST['submit'])){
  $username = ($_POST['username']);

#to delete user from db 
$delete = "DELETE FROM userinfo WHERE username = '$username'";
$query = mysqli_query($conn, $delete);
$row = mysqli_fetch_array($delete, MYSQLI_ASSOC);  
$count = mysqli_num_rows($delete);
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vibesite-Admin</title>
  <!--Fonts-->
    <!--nav-links fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <!--nav-brand fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <!--CDN for animation-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- plugins:css -->
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="node_modules/jquery-bar-rating/dist/themes/css-stars.css">
  <link rel="stylesheet" href="node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/admin.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" >&nbsp;&nbsp;&nbsp;WELCOME JYOTI!</a>
        
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        
        <div class="search-field ml-4 d-none d-md-block">
          
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item">
            <a class="nav-link" href="../pages/user/logout.php"  aria-expanded="false">
              
              <span class="d-none d-lg-inline" style="color:red" id="logout">LOGOUT</span>
            </a>
            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Dashboard</span>
                <span class="menu-sub-title">(Reported Users.)</span>
                
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#table-rusers">
                <span class="menu-title">Table</span>
                
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Rules</span>
                
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Reported accounts</h4>
                  <h2 class="font-weight-normal mb-5">
                  <?php
                    $query = "SELECT rep_id FROM report ORDER BY rep_id";
                    $query_run= mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);
                    echo $row;
                    ?>
                  </h2>
                  <p class="card-text">Decreased by 10%</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Active Users</h4>
                  <h2 class="font-weight-normal mb-5">
                    <?php
                    $query = "SELECT id FROM userinfo ORDER BY id";
                    $query_run= mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);
                    echo $row;
                    ?>
                  </h2>
                  <p class="card-text">Incresed by 60%</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Users</h4>
                  <h2 class="font-weight-normal mb-5">
                  <?php
                    $query = "SELECT id FROM userinfo ORDER BY id";
                    $query_run= mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);
                    echo $row;
                    ?>
                  </h2>
                  </h2>
                  <p class="card-text">Increased by 70%</p>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card" id="table-rusers">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>REPORTED USERS</b></h4>
                  <p class="card-description">
                    
                  </p>
                  <!--Table to display reported users-->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                         <b>Username</b>
                        </th>
                       
                        <th>
                          <b>Reason</b>
                        </th>
                        <th>
                         <b>Ban User</b>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                  $fet_que = "SELECT *  FROM report  ORDER BY rep_id ";$result4 = mysqli_query($conn, $fet_que);
                  $nrow = mysqli_num_rows($result4);
                  if ($nrow > 0) {
         
                    while($nrow = mysqli_fetch_array($result4)){

                    ?>
                  <tr class="">
                    <td><?php echo $nrow['uusername']; ?></td>
                    <td><?php echo $nrow['reason']; ?></td> 
                    <td><button class="btn-danger btn" id="del"><a href="delete.php?rep_id=<?php echo $nrow['rep_id'];?>" class="text-white">Delete User.</a></button>
                    </tr>
                    <?php 
                  }
                }
                ?> 
                    </tbody> 
                  </table>
                   
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("del").onclick = function(){
      alert("SURE? user will be removed from database.")
    }
  </script>
  <script>
    document.getElementById("logout").onclick = function(){
      alert("Adios!")
    }
    </script>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
