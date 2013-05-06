<?php
// Create connection
function connect(){
$mysqli=mysqli_connect("localhost","root","","jaj");

// Check connection
if (mysqli_connect_errno($mysqli))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  }
?> 