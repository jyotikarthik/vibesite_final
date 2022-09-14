<?php 
session_start();
    include '..\db_conn.php';
    // if(isset($_POST['edit'])){  
    $user_id =  $_GET['edit'];
    $display = "SELECT * FROM userinfo WHERE id = '$user_id'";
		$query = mysqli_query($conn,$display);

		$nrow = mysqli_num_rows($query);

		if ($nrow >0 ) {
			// code...
			
			while($nrow = mysqli_fetch_array($query)){
                $name = $nrow['name'];
                $surname = $nrow['surname'];
                $username = $nrow['username'];
                $dob = $nrow['dob'];
                $email = $nrow['email'];
                $phone = $nrow['phone'];
                $id = $nrow['id'];
            	// echo $id;
        }
	}

    if(isset($_POST['update'])){
        $name1 = $_POST['name'];
        $surname1 = $_POST['surname'];
        $dob1 = $_POST['dob'];
        $email1 = $_POST['email'];
        $phone1 = $_POST['phone'];
        $id1 = $_POST['user_id'];

        $sql = "UPDATE userinfo SET name = '$name1', surname = '$surname1', dob = '$dob1', email = '$email1', phone = '$phone1' WHERE id = '$id'";
        $query1 = mysqli_query($conn,$sql);
        if($query1){
            ?><script>alert("Profile Updated Successfully");</script><?php
        }else{
            ?><script>alert("something Went Wrong");</script><?php
        }
    }
    //Insert pic,bio and interests to table
    if(isset($_POST['pic']) && isset($_POST['bio']) && isset($_POST['int1'])&& isset($_POST['int2'])&& isset($_POST['int3'])){
        $pic = $_POST['pic'];
        $bio = $_POST['bio'];
        $int1 = $_POST['int1'];
        $int2 = $_POST['int2'];
        $int3 = $_POST['int3'];

        //$insert = "INSERT INTO userinfo (pic, bio, intrst1, intrst2, intrst3) VALUES ('$pic', '$bio', '$int1', '$int2', '$int3') WHERE id = '$id'";
        $update = "UPDATE userinfo SET  bio = '$bio', intrst1 = '$int1', intrst2 = '$int2', intrst3 = '$int3' WHERE id = $id";
        $result= mysqli_query($conn,$update);
        if(!$result){
            die('Can\'t use'. $db . ':'. mysql_error());
        }
        else{
           // echo "added sucessfully! <br><br>";
           ?>
           <script>
            alert("Profile updated!");
            </script>
            <?php
            header('location:viewProfile.php');
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
                  <a class="nav-link" href="chat.php">Chat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li> 
              </ul>
            </div>
         </div>
      </nav>
      </header>
    <div class="container">
        <div class="row gutters">
        <form method = "post">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                        <input id="imageUpload" type="file" name="pic" placeholder="Photo" capture>
                        </div>
                        <h3 class="user-name" name="username" value="<?php echo $username; ?>"><b><?php echo $username; ?></b></h3>
                        <p>Username cannot be changed!</p>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Name</label>
                            <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter full name" value="<?php echo $name; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                        </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname" value="<?php echo $surname; ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="eMail">Email</label>
                            <input type="email" class="form-control" id="eMail" name="email" placeholder="Enter email ID" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="<?php echo $phone; ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Date Of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter date of birth" value="<?php echo $dob; ?>">
                        </div>
                    </div>
                    
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                <button type="submit" id="submit" name="update" class="btn btn-primary" onclick="myFunction()">Update</button>
                                <script>
                                function myFunction(){
                                alert("Your Account has been UPdated!!");
                                }
                                </script>
                            </div>
                        </div>
                    </div>         
                </div>
                
            </div>
        </div>
        </div>
        <hr>
        <br>
        <br>
        <div class="container">
        <div class="row gutters">
        <form method = "post">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
            <div class="about">
            <h6 class="mb-2 text-primary">Additional Details</h6>
                        <h5><b>Edit Bio</b></h5>
                        <textarea class="form-control" id="description" name="bio" rows="3" value="i am dev"></textarea>
            </div>
            </div>
        </div>
        </div><br>      
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                <h6 class="mb-2 text-primary">You can add upto 3 Interest to your Profile </h6>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Interest</label>
                            <input type="text" class="form-control" name="int1" placeholder="Enter Your Interest" value="">
                            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                        </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">2nd Interest</label>
                            <input type="text" class="form-control" name="int2" placeholder="Enter Your Interest" value="">
                            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                        </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">3rd Interest</label>
                            <input type="text" class="form-control" name="int3" placeholder="Enter Your Interest" value="">
                            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                        </div>

                    </div>

                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary">Reset</button>
                                <button type="submit" id="submit" name="update" class="btn btn-primary" onclick="myFunction()">Add</button>
                                <script>
                                function myFunction(){
                                alert("Your Account has been UPdated!!");
                                }
                                </script>
                            </div>
                        </div>
                    </div>
            
        </form>        
        </div>
        </div>
        
</body>
</html>

