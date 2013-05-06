<?php
require_once('lib/DBLib.php');
$name=$_GET['name'];
$date=$_GET['date'];
$time=$_GET['time'];
$desc=$_GET['desc'];
$lng=$_GET['longitude'];
$lat=$_GET['latitude'];
$instrument=$_GET['instruments'];
$mobile=$_GET['mobile'];



insertDataIntoDB($lat,$lng,$name,$desc,$mobile,$instrument,$date,$time);


echo "Your event has been added";
echo "Click to go to home <a href='index.php'>Click here </a>";
exit;

?>