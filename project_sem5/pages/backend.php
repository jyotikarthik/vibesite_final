<!--Connecting to db-->
<?php
 $servername= "localhost";
 $username="root";
 $password= "";
 $db="logindata";

 $conn= mysqli_connect($servername,$username,$password,$db);

 if(!$conn){
     die('Can\'t use'. $db . ':'. mysql_error());
 }
 // insert auther -Adarsh 
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $username = trim($_POST["username"]);
    $dob = trim($_POST["dob"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $pass = trim($_POST["pass"]);

    $query = "INSERT INTO `userinfo`(name, surname, username, dob, email, phone, pass) VALUES('".$name."','".$surname."','".$username."','".$dob."','".$email."','".$phone."','".$pass."') ";
    $query2 = "SELECT * FROM userinfo where username = '$username'";

    // $execute = ;

    $execute2 = mysqli_query($conn, $query2);
    if(mysqli_num_rows($execute2)>0){
        // echo "Username already taken!!!";
        ?>
        <script>
            alert("Username already taken!!!")
        </script>
        <?php
        header("Location: form.php");
        
    }
    else if(mysqli_query($conn, $query)){
        ?>
        <script>
            alert("Account created successfully, you can Login to your acount now.")
            window.location.replace("log2.php");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("OOPs man seems like error!!!")
        </script>
        <?php
    }


 }

  ?>