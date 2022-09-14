<?php
session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['pass'])){
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return data;
  }
}

$username = validate($_POST['username']);
$pass = validate($_POST['pass']);

if(empty($username)){
  header ("Location: login.php?error=User Name is required");
  exit();
}
elseif(empty($pass)){
  header ("Location: login.php?error=Password is required");
  exit();
}
$sql = "SELECT * FROM userinfo where username='$username' AND pass='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)=== 1){
  $row = mysqli_fetch_assoc($result);
  if($row['username']=== $username && $row['pass']===$pass){
    ?>
    <script>
      alert("Welcome to vibesite.");
    </script>
    <?php
    header("Location: /user/viewProfile.php");
  }
  else{
    header("Location: login.php?error=Incorrect username or password");
    exit();
  }
}
else{
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/style1.css" rel="stylesheet">
    <!--Fonts-->
    <!--nav-links fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
</head>
<body>
    <form class="log-content" action="/login.php">
        <div class="container">
          <h1>Login Directly!</h1>
          <p>Enter your unique username and password to login to your Vibesite account.</p>
          <hr>
          <label for="text"><b>Username</b></label>
          <input type="text" placeholder="Enter username" name="uname" required>
    
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="pass" required>
    
          <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            <p>Checking Remember me enables your browser to remember your password for security purpose you can enable it.</p>
          </label>
          <div class="log">
            <a href="form.html">Not a Member yet? Sign UP</a>
          </div>
          <div class="log">
            <a href="about.html">User Guide~</a>
          </div>
    
          <div class="clearfix">
            <button type="submit" name="login" class="signupbtn">Login</button>
            <button type="button"  class="cancelbtn">Cancel</button>
          </div>
        </div>
      </form>
</body>
</html>