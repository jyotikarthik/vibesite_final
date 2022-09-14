<?php
session_start();
include "db_conn.php";
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
if(isset($_POST['login'])){
    $username = ($_POST['username']);
    $pass = ($_POST['pass']);

    

    $sql = "select* from userinfo where username='$username' and pass='$pass'";
    $query = mysqli_query($conn, $sql);
    // $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($query);

        if ($username == 'jyotik'){
            echo "Welcome Admin!";
            
            header('location:../admin/admin.php');
            ?><script>alert("Welcome Jyoti!");</script><?php
        }
        else{
            ?><script>alert("Sorry you dont have access to admin page.");</script><?php
        }
    
    
}
?>
 <form class="modal-content" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>  " method="post">
        <div class="container">
          <h1>Admin Login</h1>
          <p>Enter Your Credentials to login.</p>
          <hr>
          
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter your Username" id="username" name="username" minlength="2" maxlength="25" required>&nbsp;
    
          <label for="psw"><b>Password</b></label>
          <input class="pass" type="password" placeholder="Enter your password" id="psw" name="pass" required>

          <div class="clearfix">
            <button type="submit"  name="login" class="signupbtn">Log in</button> 
            <button type="button" class="cancelbtn">Cancel</button>
          </div>
          <div class="log">
        
        <a href="form.php">Don't have an account? &nbsp; Sign UP! </a>
      </div>
        </div>
      </form>
</body>
</html>