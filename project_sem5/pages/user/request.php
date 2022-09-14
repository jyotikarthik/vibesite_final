<?php
include "../db_conn.php";
session_start();
// echo"<pre"; print_r($_POST);
if(isset($_POST['receiver_id'])){
  ?>
  <script>alert("i am here");</script>
  <?php
    $receiver_id = $_POST['receiver_id'];
    $sender_id = $_POST['sender_id'];
    $request_status = $_POST['request_status'];
    $datetime = $_POST['datetime'];

    $query = "INSERT INTO `request`(`sender_id`, `receiver_id`, `req_status`, `datetime`) VALUES ('$sender_id', '$receiver_id','$request_status','$datetime')";
    $result = mysqli_query($conn, $query);
    if($result){
      ?>
      <script>alert("request seved successfully");</script>
      <?php
    }
    // echo"<pre>";print_r($datetime);
}

  $user_id =  $_SESSION['id'];
  
  $query = "SELECT * FROM request WHERE receiver_id= '$user_id' AND req_status='pending' ";
  $result = mysqli_query($conn, $query);
  

// $query = "SELECT * FROM req WHERE req_status = 'Pending' ORDER BY req_id";
// $result = mysqli_query($conn, $query);
// while($row = mysqli_fetch_array($result)){
//     //id whose req_status == 0(pending)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My account </title>
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
              <a class="nav-link" href="../../new_chat/@@cht">Chat</a>
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
<div class="card">
  <div class="container">
      <h3>Pending requests</h3>
    <table id ="users" class="table table-success table-striped">
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php $counter = 1;while($row = mysqli_fetch_array($result)){
          $sender_id = $row['sender_id'];
          $query1 = "SELECT * FROM userinfo WHERE id='$sender_id'";
          $result1 = mysqli_query($conn, $query1); while($row1 = mysqli_fetch_array($result1)){?>
        <tr>
          <td><?php echo $counter ?></td>
          <td><?php echo $row1['username'];?></td>
          <td><button class='edit btn btn-sm btn-primary accept'  onclick="accept('<?php echo $row1['id'];?>')" value="<?php echo $row1['id'];?>">Approve</button> <button class='delete btn btn-sm btn-danger reject' onclick="reject('<?php echo $row1['id'];?>')" value="<?php echo $row1['id'];?>">Deny</button></td>
         
        </tr>
        <?php
              $counter++;}}
          ?>

</table>

</div>

<?php

// if(isset($_POST['Confirm'])){
//     $req_id = $_POST['req_id'];

//     $select = "UPDATE req SET req_status='Confirm' WHERE req_id ='$req_id'";
//     $res = mysqli_query($conn, $select);

//     echo '<script type = "text/javascript">';
//     echo 'alert("New Friend Added!");';
//     echo '</script>';
// }
// if(isset($_POST['Rejected'])){
//     $req_id = $_POST['req_id'];

//     $select = "UPDATE req SET req_status='Rejected' WHERE req_id ='$req_id'";
//     $res = mysqli_query($conn, $select);

//     echo '<script type = "text/javascript">';
//     echo 'alert("Request Deleted");';
//     echo '</script>';
// }
?>
<script>
  function accept(sender_ids){
      // var sender_ids = $(".accept").val();
      var status = "approved";
      // alert(sender_ids);
    $.ajax({
       url:'backend.php',
       type: 'post',
       data: {sender_ids: sender_ids,
              status:status,
        },
       success: function(response){
          // $('#response').text('name : ' + response);
          alert("request approved");
       }
    });
  };
  function reject(rejected_ids){
      // var sender_ids = $(".accept").val();
      var status = "rejected";
      // alert(sender_ids);
    $.ajax({
       url:'backend.php',
       type: 'post',
       data: {rejected_ids: rejected_ids,
              status:status,
        },
       success: function(response){
          // $('#response').text('name : ' + response);
          alert("request rejected");
       }
    });
  };
</script>
<!-- <?php
  // if(isset($_POST['sender_ids'])){
    // $sender_ids = $_POST['sender_ids'];
    // $status = $_POST['status'];
    // $update = "UPDATE request SET req_status ='$status' WHERE req_id ='$sender_ids'";
    // $res = mysqli_query($conn, $update);
    // if($res){
    //     echo "request approved";
    // }else{
    //   echo "something error found";
    // }

  // }
?> -->