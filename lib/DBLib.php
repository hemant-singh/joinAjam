<?php
/*
$mysqli=mysqli_connect("localhost","root","","jaj");

// Check connection
if (mysqli_connect_errno($mysqli))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
*/
include("connection.php");
function getAllDataFromDB()
{
$mysqli=mysqli_connect("localhost","root","","jaj");

$index=array();
$lat=array();
$lng=array();
$name=array();
$desc=array();
$mobile=array();
$instrument=array();
$event_date=array();
$event_time=array();

/*
if ($stmt = $mysqli->prepare("SELECT * FROM jajdata ")) {

    /* bind parameters for markers */
    //$stmt->bind_param("s", $city);

    /* execute query */
/*
    $stmt->execute();
	$res=1;
	$i=0;
	
	$stmt->bind_result(
	$index[$i],$lat[$i],$lng[$i],$name[$i],$desc[$i],$mobile[$i],$instrument[$i],$event_date[$i],$event_time[$i]	
	//$allData
	);
	while($res=1)
	{
    
	$i++;
    $res=$stmt->fetch();
	
}
    

  
  $stmt->close();
	
}
*/


$result = mysqli_query($mysqli,"SELECT * FROM jajdata");
$i=0;
while($row = mysqli_fetch_array($result))
  {
$lat[$i]=$row['lat'];
$lng[$i]=$row['lng'];
$name[$i]=$row['name'];
$desc[$i]=$row['event_desc'];
$mobile[$i]=$row['mobile'];
$instrument[$i]=$row['instrument'];
$event_date[$i]=$row['event_date'];
$event_time[$i]=$row['event_time'];
  $i++;
  
  }
$data=array($index,$lat,$lng,$name,$desc,$mobile,$instrument,$event_date,$event_time);


return $data;

}


function insertDataIntoDB($lat,$lng,$name,$desc,$mobile,$instrument,$date,$time)
{
$mysqli=mysqli_connect("localhost","root","","jaj");
if (mysqli_connect_errno($mysqli))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
if($stmt = $mysqli->prepare("INSERT INTO jajdata (lat,lng,name,event_desc,mobile,instrument,event_date,event_time)
VALUES(?,?,?,?,?,?,?,?) ")){

 
 /* bind parameters for markers */
    $stmt->bind_param("ssssssss", $lat,$lng,$name,$desc,$mobile,$instrument,$date,$time);

    /* execute query */
   $a=$stmt->execute();     
    /* close statement */
  $stmt->close();
}
else
NULL;
}

?> 