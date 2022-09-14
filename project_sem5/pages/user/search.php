<!--PHP Query for search in explore-->
<?php
include '..\db_conn.php';

$query = $_GET['search_key']; 
// gets value sent over search form

$min_length = 1;
// you can set minimum length of the query if you want

if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
  
  $query = htmlspecialchars($query); 
  // changes characters used in html to their equivalents, for example: < to &gt;
  
  //$query = mysql_real_escape_string($query);
  // makes sure nobody uses SQL injection
  
  $raw_results = mysqli_query($conn,"SELECT * FROM userinfo WHERE (`username` LIKE '%".$query."%') OR (`intrst1` LIKE '%".$query."%') OR (`intrst2` LIKE '%".$query."%') OR (`intrst3` LIKE '%".$query."%')") or die(mysql_error());
if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
  $results = mysqli_fetch_array($raw_results);	
  print_r($results);
  // while($results = mysqli_fetch_array($raw_results)){
  // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
  
    // echo "<p><h3>".$results['username']."</h3>".$results['intrst1'].",".$results['intrst2'].",".$results['intrst3']."</p>";
    // posts results gotten from database(title and text) you can also show id ($results['id'])
  // }
  
}
else{ // if there is no matching rows do following
  echo "No results";
}

}
else{ // if query length is less than minimum
echo "Minimum length is ".$min_length;
}
?>