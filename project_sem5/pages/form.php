 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Signup</title>
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
 <form class="modal-content" action="backend.php" method="post">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <span for="name"><b>Name</b></span>
      <input type="text" placeholder="Enter your first name" id="name" name="name" maxlength="25" minlength="2" required>

      <label for="sname"><b>Surname</b></label>
      <input type="text" placeholder="Enter your last name" id="surname" name="surname" maxlength="25" minlength="2" required>

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter your Username" id="username" name="username" minlength="2" maxlength="25" required>&nbsp;

      <label for="dob"><b>Date Of Birth</b></label>
      <input type="date" placeholder="Enter Date of birth" id="dob" name="dob" min="1977-12-12" max="2007-12-12" required><br><br>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter your Email" id="email" name="email" maxlength="100" required>

      <label for="phone"><b>Phone</b></label>
      <input type="phone" placeholder="Enter your phone number" id="phone" maxlength="10" name="phone" required><br><br>

      <label for="psw"><b>Password</b></label>
      <input class="pass" type="password" placeholder="Enter your password" id="psw" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input class="rpass" type="password" placeholder="Repeat Password" id="psw-repeat" name="rpass" size="100" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label><hr>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="submit"  name="submit" class="signupbtn">Sign Up</button> 
        <button type="button" class="cancelbtn">Cancel</button>
      </div>
      <div class="log">
        <a href="log2.php">Already have an account? &nbsp; Login Directly! </a>
      </div>
    </div>
  </form>
  <script>
    document.querySelector('.signupbtn').onclick = function(){
      var pass = document.querySelector('.pass').value,
      rpass= document.querySelector('.rpass').value;

     if(pass != rpass){
      alert("Password didn't match, please try again.")
      return false;
     }
     else{
      
     }
     return true;
    }

  </script>
 </body>
 </html>