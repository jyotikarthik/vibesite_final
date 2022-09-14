<?php
include '..\db_conn.php';
session_start();
// echo "<pre>";print_r($_POST);exit;
if (isset($_POST['user_id'])) {
  # code...
  $u_id = $_POST['user_id'];
  $status = $_POST['status'];
  $uusername = $_POST['uusername'];
  $report_sender = $_POST['report_sender'];
  
  $qu = "INSERT INTO report (`user_id`, `rep_status`, `uusername`, `report_sender`) VALUE ('".$u_id."','".$status."','".$uusername."','".$report_sender."')";
  $result = mysqli_query($conn, $qu);
  if (!$result) {
    # code...
    ?>
    <script>
      alert("users reported succefully");
    </script>
    <?php
  }
}
#insert into report table
if(isset($_POST['username']) && isset($_POST['rep'])){
  $username = $_POST['username'];
  $rep = $_POST['rep'];

  $insert = "INSERT INTO report (username, rep) VALUES ('$username', '$rep')";
  $result = mysqli_query($conn, $insert);

  if(!$result){
    die('Can\'t use'. $db . ':'. mysql_error());
}
else{
    ?>
    <script>
      alert('Account reported.');
      </script>
    <?php
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit-info</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../css/styleuser.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <!--Social media style-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">My Account</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../../index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="explore.php">Explore</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="request.php">Requests</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="chat.php">Chat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php" onclick="logout()">Logout</a>
                </li> 
                <script>
                function logout(){
                   alert("Your account will be logged out!"); }
                </script>
              </ul>
            </div>
         </div>
      </nav>
      </header>
    <div class="container">
        
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                  <form action="backend.php" method="post">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Report</h6>
                    </div>
                    <?php $fet_que = "SELECT *  FROM report WHERE report_sender	= '".$_SESSION['id']."' ORDER BY rep_id LIMIT 1";$result = mysqli_query($conn, $fet_que);$Vrow = mysqli_fetch_assoc($result); ?>
                    
                    <p class="user-name" name="username" id="userName"><h3><?php echo $Vrow['uusername'] ?></h3></p>
                    <input id="uu_id" name="uu_id" id ="rep" type="hidden" value="<?php echo $Vrow['rep_id'] ?>"></input>
                    <div class="about">
                        <h5><b>Reason To Report The User</b></h5>
                        <textarea class="form-control" id="description" name="rep" rows="3"></textarea>
                    </div>
                   <br>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                            <button type="button" id="submit" name="cancel" class="btn btn-secondary">Cancel</button>
                                <button type="submit" id="submit" name="submit" class="btn btn-danger">Report</button>
                            </div>
                        </div>
                    </div> 
                </form>        
                </div>
                
            </div>
        </div>
        </div><br>
        
        </div>
        </div>
        <script>
          document.getElementById("rep").onclick = function(){
          alert("User has been reported.")
    }
  </script>
</body>
</html>