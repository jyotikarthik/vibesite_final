<?php
include 'pages/db_conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vibesite-find_your_perfect_vibe_here</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
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
        <nav>
            <div>
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <!--<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="/js/20953-bravo-studio-clapping-hands.json"  background="transparent"  speed="1"  style="width: 40px; height: 40px;"  loop autoplay></lottie-player> -->
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
              <span>
                <lottie-player
                src="js/20953-bravo-studio-clapping-hands.json"
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="pages/about.php">About Us</a>
                          </li>
                          <?php
                          if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
                          {
                              echo "<li class='nav-item'>
                              <a class='nav-link' href='pages/user/logout.php' onclick='logout()'>Logout</a>
                            </li>";
                            ?>
                            <script>
                              function logout(){
                              alert("Your account will be logged out!"); }
                             </script>
                            <?php

                            echo"<li class='nav-item'>
                            <a class='nav-link' href='pages/user/viewProfile.php'>My Account</a>
                          </li>";
                          }
                          else
                          {
                              echo "<li class='nav-item'>
                              <a class='nav-link' href='pages/log2.php'>Login/Signup</a>
                            </li>";
                          }
                          ?>
                          
                          <li class="nav-item">
                            <a class="nav-link " href="pages/adminlogin.php">Admin</a>
                          </li>
                         
                        </ul>
  
                      </div>
                    </div>
                  </nav>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <h3>World is better with right people.</h3>
            <h1>Find friends who match your <span class="change_content"></span></h1>
            <p>"Vibesite is safe and trustworthy"</p>
            <div>Create free Account, Find friends who match your VIBES!</div><br>
            <a href="pages/about.html" class="btnabout">Learn More</a>
            <a href="pages/log2.php" class="btnlog">Login/Sign Up</a>
        </section>
    </main>
    <footer>
      
      <a href="#" class="fa fa-facebook"></a>
      <a href="https://instagram.com/jyoti_karthik?igshid=YmMyMTA2M2Y=" target="_blank" class="fa fa-instagram"></a>
      <a href="https://www.linkedin.com/in/jyotipanda2002" target="_blank" class="fa fa-linkedin"></a>
      <a href="https://github.com/jyotikarthik" target="_blank" class="fa fa-github"></a>
      
  </footer>
</body>
</html>