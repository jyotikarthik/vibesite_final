<?php
include "../db_conn.php";
// echo "<pre>";print_r($_POST);
if(isset($_POST['sender_ids'])){
    $sender_ids = $_POST['sender_ids'];
    $status = $_POST['status'];
    $update = "UPDATE request SET req_status ='$status' WHERE sender_id='$sender_ids'";
    $res = mysqli_query($conn, $update);
    if($res){
        echo "request approved";
    }else{
      echo "something error found";
    }

  }

  if(isset($_POST['rejected_ids'])){
    $rejected_ids = $_POST['rejected_ids'];
    $status = $_POST['status'];
    $update = "UPDATE request SET req_status ='$status' WHERE receiver_id='$rejected_ids'";
    $res = mysqli_query($conn, $update);
    if($res){
        echo "request rejected";
    }else{
      echo "something error found";
    }

  }

  //report user code
  if (isset($_REQUEST['submit'])) {
    # code"
    // echo"<pre>";print_r($_POST);
    $uu_id =  $_REQUEST['uu_id'];
    $reson = $_REQUEST['rep'];

    $rep_update = "UPDATE report SET reason ='$reson' WHERE rep_id='$uu_id'";
    $res = mysqli_query($conn, $rep_update);
    if($res){
        // echo "request approved(";
        header("Location:viewProfile.php");
    }else{
      echo "something error found";
    }


  }
?>