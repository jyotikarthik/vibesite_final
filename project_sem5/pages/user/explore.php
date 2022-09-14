<?php
include '..\db_conn.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore-vibesite</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../css/styleexplore.css" rel="stylesheet">
    
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
    <!--icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!--Javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/script.js"></script>
</head>
<body>
    <header>
        <nav>
            <div>
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <!--<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="/js/20953-bravo-studio-clapping-hands.json"  background="transparent"  speed="1"  style="width: 40px; height: 40px;"  loop autoplay></lottie-player> -->
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
              <span>
                <lottie-player
                src="../../js/20953-bravo-studio-clapping-hands.json"
                background="transparent"
                speed="1"
                style="width: 50px; height: 50px"
                loop
                autoplay
              ></lottie-player>
              </span>
                      <a class="navbar-brand" href="#">Vibesite</a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../index.php">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="explore.php">Explore</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="viewProfile.php">My Account</a>
                          </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search User" aria-label="Search">
                            
                        </form>
                      </div>
                    </div>
                  </nav>
            </div>
        </nav>
    </header>
    <section class="intro">
      <div class="bg-image h-100" >
        <div class="mask d-flex align-items-center h-100">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <div class="card mb-2">
                  <div class="card-body d-flex justify-content-between py-2">
                    <form action="" method="">
                    <div class="input-group input-group-lg">
                      <span class="input-group-text border-0 px-1" id="basic-addon2"><i class="bi bi-search" style="color: #939597;"></i></span>
                      <input type="text" class="form-control form-control-lg rounded" placeholder="Search" id="searchbar" name="query" aria-label="Search" aria-describedby="basic-addon2" />
                    </div>&nbsp;

                    <p class="mb-0 d-flex flex-row align-self-center" style="color: #939597;"><span class="font-weight-bold pe-1"><button type="submit" class="btn btn-dark btn-rounded" value="Search" id="sbutton">Search</button></p>
                  </div>
                    </form>
                </div>
                
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--DISPLAYING-USERs-->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

                          <?php
                          $sql = "SELECT * from userinfo";
                          // $result=mysqli_query($conn,$sql);
                          $query = mysqli_query($conn,$sql);
                          $nrow = mysqli_num_rows($query);
                          if($nrow>0){
                            while($nrow = mysqli_fetch_array($query)){
                              echo"
                              <div class='container profile-page'>
                              <div class='row'>
                                  <div class='col-md-10 col-lg-8 col-xl-7 mx-auto'>
                                      <div class='card profile-header'>
                                          <div class='body'>
                                              <div class='row' id ='list'>
                                                  <div class='col-lg-4 col-md-4 col-12'>
                                                      <div class='profile-image float-md-right'> <img src='https://bootdey.com/img/Content/avatar/avatar7.png' > </div>
                                                  </div>
                                                  <div class='col-lg-8 col-md-8 col-12'>
                                                  
                              <h4 class='m-t-0 m-b-0'><strong>".$nrow['username']."</strong></h4>
                              <span class='job_post'><b>Interests</b></span>
                              <div class='well'>
                                
                                  <p>
                                    <span class='label label-info'>".$nrow['intrst1']."</span>
                                    <span class='label label-warning'>".$nrow['intrst2']."</span>
                                    <span class='label label-danger'>".$nrow['intrst3']."</span> &nbsp;

                                  </p>
                                  <div>
                                      <button class='btn btn-primary btn-round follow' id='follow'onclick='follow(".$nrow['id'].")' value='".$nrow['id']."'>Follow</button>
                                      <button class='btn btn-primary btn-round btn-simple'id = 'message' href='../../new_chat/@@cht'>Message</button>
                                  </div>
                                  
                                  </div>
                                  
                                  </div>                
                                </div>
                              </div>                    
                            </div>
                          </div>";
                            }
                          }
                          ?>
                           <!--js code to redirect to other page-->
                           <script>
                            document.getElementById("#message").onclick = function(){
                              location.href = "../../new_chat/@@cht";
                            };
                            // document.getElementById("#follow").onclick = function(){
                            //   // $("input:text").val("Glenn Quagmire");
                            //     location.href = "request.php";
                            // };
                            </script>
                            
                        </div>                
                    </div>
                </div>                    
            </div>
        </div>
        
	</div>
</div>
<!--AJAX code to fetch id to send/acc req-->
<script>
  // $(document).ready(function(){

  //   $('#searchbar').keyup(function(){

  //     var query = $(this).val();
  //     if(query != ''){
  //       $.ajax({
  //         url:"search.php",
  //         method: "POST",
  //         data:{query:query},
  //         success:function(data){
  //           $('#list').html(data);
  //         }
  //       })

  //     }
  //     else{
  //       $('#list').html(data);
  //     }
  //   });
  //   $document.on('click', '.list.', function(){
  //     $('#searchbar').val($.trim($(this).text()));
  //     $('#list').fadeOut();
  //   });3

   
  // });
  function follow(receiver_id){
    // alert("we are here ");
      // var receiver_id = $(".follow").val();
      var sender_id = "<?php echo $_SESSION['id'] ?>";
      var request_status = "pending";
      var datetime = "<?Php echo date("Y-m-d H:i:s") ?>";
      $.ajax({
		      url: "request.php",
		      type: "POST",
		      data: {
			          receiver_id: receiver_id,
			          sender_id: sender_id,
			          request_status: request_status,
			          datetime: datetime				
		          },
		      success: function(dataResult){

              alert("request send sucessfully!");
		      }
	    });
      // alert(receiver_id+sender_id);
    };
    $("#sbutton").click(function(){
      var search_key = $("#searchbar").val();
      $.ajax({
		      url: "search.php",
		      type: "GET",
		      data: {
			          search_key: search_key,
			          			
		          },
		      success: function(dataResult){

              alert(dataResult);
		      }
	    });
    });
      </script>
<?php
function wrap_tag($argument){
  return'<b>'.$argument.'</b>';
}
?>

</body>
</html>
