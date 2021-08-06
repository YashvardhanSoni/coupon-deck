<?php
header("Content-type:application/json");
$con = mysqli_connect("localhost", "root", "", "coupondeck");

if(!$con){
die('Could not connect: '.mysqli_error());
}

$result = mysqli_query($con, "SELECT * FROM image_slider");

while($row = mysqli_fetch_assoc($result)){
$output[]=$row;
}

echo(json_encode($output, JSON_PRETTY_PRINT));

mysqli_close($con);

?>
