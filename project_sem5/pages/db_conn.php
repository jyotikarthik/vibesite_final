<?php
$servername= "localhost";
$username="root";
$password= "";
$db="logindata";

$conn= mysqli_connect($servername,$username,$password,$db);

if(!$conn){
    die('Can\'t use'. $db . ':'. mysql_error());
}else{
    
}
?>