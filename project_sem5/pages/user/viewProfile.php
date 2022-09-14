<?php

include '..\db_conn.php';
session_start();
$us = $_SESSION['id'];
$query="SELECT *
 FROM userinfo
 LEFT JOIN request
 ON userinfo.id = request.receiver_id where request.req_status = 'approved' and  request.sender_id='".$us."'";
 $result = mysqli_query($conn, $query);
 $nrow = mysqli_num_rows($result);
 
      

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
      thead, tbody { display: block; }

  tbody {
    height: 143px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
  }
    </style>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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
              <script>
                function logout(){
                   alert("Your account will be logged out!"); }
                </script>
            </li> 
          </ul>
          
        </div>
      </div>
    </nav>
  </header>
    <div class="container">
        <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        
                        <img src='https://bootdey.com/img/Content/avatar/avatar7.png' alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4><?php echo strtoupper($_SESSION['username']);?></h4>
                          <p class="text-secondary mb-1"><?php echo strtoupper($_SESSION['bio']);?></p><br>
                          <div class="row">
                            <div class="col-sm-12">
                              <a class="btn btn-info " target="blank" href="edit.php?edit=<?php echo $_SESSION['id']?>" id="edittt" value="<?php echo $_SESSION['id']?>">Edit</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><br>
                  
                  <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p><strong>HEY!</strong></p>
                    People are looking at your profile. Find out who.
                  </div>
                
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo strtoupper($_SESSION['username']);?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo strtoupper($_SESSION['name']);?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Surname</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo strtoupper($_SESSION['surname']);?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Date of Birth</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo strtoupper($_SESSION['dob']);?>
                        </div>
                      </div>
                      <hr>
                      <div class="well">
                        <p><a href="#">Interests</a></p>
                        <p>
                          <span class="label label-info"><?php echo strtoupper($_SESSION['int1']);?></span>
                          <span class="label label-warning"><?php echo strtoupper($_SESSION['int2']);?></span>
                          <span class="label label-danger"><?php echo strtoupper($_SESSION['int3']);?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="container">
            <div class="main-body">
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                        <div class="row">
                  <div class="col-lg-12 ">
                    <h3>Friend List</h3><hr>
                    <table class="table table-striped ">
                        
                        <thead>
                            
                          <tr>
                            
                            <th scope="col">Username</th>
                            <th scope="col">Message</th> 
                            <th scope="col">Report user</th>
                            
                          </tr>
                        
                        </thead>
                        
                        <tbody id="username">
                          <?php if($nrow>0){
                           while($nrow = mysqli_fetch_array($result)){
                             // echo"<pre>";print_r($nrow['name']);
                          ?>
                          <tr>
                            
                            <td  id="uusername<?php echo $nrow['id'];?>"><?php echo $nrow['name'] ?></td>
                            <td><button class='edit btn btn-sm btn-primary' href="../../new_chat/@@cht" id="msg">Message</button></td>
                            <td><button class='delete btn btn-sm btn-danger' 
                            onclick="reportUser('<?php echo $nrow['id'];?>')" id ="<?php echo $nrow['id'] ?>">Block</button></td>
                          </tr>
                          <?php }
                        }else{
                          ?>
                          <tr><td> NO Friends Found .. Please Check Request Pending</td></tr>
                          <?php
                        }?>
                        </tbody>
                      </table>
                  </div>
                      </div>
                        </div>
                        </div>
                        </div>
                        
        <!--Friend list-->
        <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
              <h3>Why VIBESITE?</h3><hr>
                            <p >Your security and privacy matters to us. Soon VIBESITE will get you a feature of customizable Avatar!</p>
                            <p >Edit your profile anytime easily, To add your INTEREST and BIO click on the EDIT button below your Avatar.</p>
                            <p>Chat with your Friends. Common CHAT-ROOM for all the Vibesite user! Will soon introduce Private chat portals for user privacy.</p>
                            <p >Report Acounts performing malpractices. Click on report button and report user Actions will taken ASAP if the reported is guilty.</p>
                            <p>STAY TUNED! FOR ALL THE AMAZING UPDATES IN THE FUTURE. HAPPY VIBING!</P>
                            
                            <a href="about.html">Help?</a>
                            <a href="mailto:jyotirani200861@mccmulund.ac.in">Contact Us</a>
            </div>
          </div>
        </div>
        <script>
           document.getElementById("msg").onclick = function(){
            location.href = "../../new_chat/@@cht";
          };
             document.getElementById("unfollow").onclick = function(){
             location.href = "request.php";
          };
        //   document.getElementById("#rep").onclick = function(){
        //      location.href = "report.php";
        //  };
        // $('#rep').click(function{

        // });
        // $(".rep").click(function(){
        //     alert("The paragraph was clicked.");    
        // });
function reportUser(reportUser_id){
  var user_id = reportUser_id;
  var status = 'reported';
  var uusername = $('#uusername'+user_id+'').text();
  var report_sender = '<?php echo $_SESSION['id']?>';
  // alert(report_sender);
  // location.href='report.php';
  $.ajax({
		url: "report.php",
		type: "POST",
		data: {
			user_id: user_id,
			status: status,
      uusername:uusername,
      report_sender:report_sender
							
		},
		
		success: function(dataResult){
			// var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				// alert("logged in succefully");
        
        	// location.href='report.php';
			}
			else if(dataResult.statusCode==201){
				alert("Error occured !");
			}
			
		}
	});
  location.href='report.php';
	   
}
</script>
                  
</body>
</html>