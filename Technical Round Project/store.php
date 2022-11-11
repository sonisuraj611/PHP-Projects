<?php
require 'dbconnect.php';

$q = "Select * from students";
$res = mysqli_query($conn,$q);

if(!$res){
    echo 'Error connecting to db';
}

$mainarr = array();
while($row = mysqli_fetch_assoc($res)){
    
    $name = $row['name'];
    $regno = $row['regno'];
    $english = $row['english'];
    $hindi = $row['hindi'];

    $temp = array($name,$regno,$english,$hindi);
    array_push($mainarr,$temp);
}

$header = array("name","regno","english","hindi");
$fptr = fopen('data.csv','w');
fputcsv($fptr,$header);
foreach ($mainarr as $val) {
    fputcsv($fptr,$val);
}
fclose($fptr);


// $header=array("regno","name","class","maths","physics","chemistry");
// $open=fopen("store.csv","w");
// fputcsv($open,$header);
// foreach($storearr as $data){
//   fputcsv($open,$data);
// }

// fclose($open);
?>