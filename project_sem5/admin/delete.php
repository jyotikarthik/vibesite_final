<?php
include "../pages/db_conn.php";

$id = $_GET['rep_id'];

$q = "DELETE FROM report WHERE rep_id=$id";

mysqli_query($conn,$q);

header('location:admin.php');
?>