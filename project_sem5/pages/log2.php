<?php
session_start();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
<?php

include 'db_conn.php';

if(isset($_POST['submit'])){
  $username = ($_POST['username']);
  $pass = ($_POST['pass']);

  if(isset($username) && ($pass)){
    $sql = "SELECT * from userinfo WHERE username ='$username' AND pass='$pass'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query, MYSQLI_ASSOC);  
  $count = mysqli_num_rows($query); 
  
  if($count == 1){  
    // echo "<h1><center> Login successful </center></h1>";
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['surname'] = $row['surname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['dob'] = $row['dob'];
    $_SESSION['pic'] = $row['pic'];
    $_SESSION['bio'] = $row['bio'];
    $_SESSION['int1'] = $row['intrst1'];
    $_SESSION['int2'] = $row['intrst2'];
    $_SESSION['int3'] = $row['intrst3'];
    $_SESSION['username'] = $username;
    header("Location: user/viewProfile.php");
    ?><script>alert("Login successful");</script><?php  
}  
else{  
    // echo "<h1> Login failed. Invalid username or password.</h1>";
    header("Location: form.php"); 
    ?><script>alert("Login failed. Invalid username or password.");</script><?php 
}     
}else
{?>
  <script>
    alert("Bruh! seems like a error.")
   </script><?php
$_SESSION['status'] = "Email ID or Password is invalid";
header('Location: form.php');
  }
}
?>

    <form class="modal-content" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>  " method="post">
        <div class="container">
          <h1>Login</h1>
          <p>Enter Your Credentials to login.</p>
          <hr>
          
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter your Username" id="username" name="username" minlength="2" maxlength="25" required>&nbsp;
    
          <label for="psw"><b>Password</b></label>
          <input class="pass" type="password" placeholder="Enter your password" id="psw" name="pass" required>

          <div class="clearfix">
            <button type="submit"  name="submit" class="signupbtn">Log in</button> 
            <button type="button" class="cancelbtn">Cancel</button>
          </div>
          <div class="log">
        <a href="form.php">Don't have an account? &nbsp; Sign UP! </a>
      </div>
        </div>
      </form>
</body>
</html>