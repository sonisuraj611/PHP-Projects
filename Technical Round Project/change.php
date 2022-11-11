<?php
// session_start();
require 'dbconnect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['snoEdit'])){
        $sno = $_POST['snoEdit'];
        $name = $_POST['nameEdit'];
        $regno = $_POST['regnoEdit'];
        $eng = $_POST['englishEdit'];
        $hindi = $_POST['hindiEdit'];

        $q = "UPDATE `students` SET `name` = '$name', `regno` = '$regno', `english` = '$eng', `hindi` = '$hindi' WHERE `students`.`sno` = '$sno';";
        $res = mysqli_query($conn,$q);

        header('location: portal.php');
    }

}
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['slmodal'])){
    $selectarr = $_POST['select'];

    for ($i=0; $i < count($selectarr); $i++) { 
      $q = "DELETE FROM students WHERE `students`.`sno` = $selectarr[$i]";
      $res = mysqli_query($conn,$q);
    }
  }
  header('location: portal.php');
}




?>