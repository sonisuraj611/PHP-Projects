<?php
session_start();
$n = $_SESSION['studentNum'];
if($n > 0){
  $populate = true;
}
require 'dbconnect.php';

  if(isset($_GET['turncate'])){
    if($_GET['turncate']== true){
      $q = "TRUNCATE TABLE `portal`.`students`";
      $res = mysqli_query($conn,$q);
      $_GET['turncate'] = false;
      header('location: portal.php');
    }
  }
  if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    echo $sno;
    $q = "DELETE FROM `students` WHERE `students`.`sno` = $sno";
    $res = mysqli_query($conn,$q);
    header('location: portal.php');
  }

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['snoEdit'])){
    $sno = $_POST['snoEdit'];
    $name = $_POST['nameEdit'];
    $regno = $_POST['regnoEdit'];
    $eng = $_POST['englishEdit'];
    $hindi = $_POST['hindiEdit'];

    $q = "UPDATE `students` SET `name` = '$name', `regno` = '$regno', `english` = '$eng', `hindi` = '$hindi' WHERE `students`.`sno` = $sno;";
    $res = mysqli_query($conn,$q);

    // header('location: portal.php')
}
else{

  $name = $_POST['name'];
  $nameArr = array();
  foreach ($name as $val) {
   array_push($nameArr,$val);
  }

  $regno = $_POST['regno'];
  $regnoArr = array();
  foreach ($regno as $val) {
   array_push($regnoArr,$val);
  }
  // $regnoArr[$i];
  $eng = $_POST['eng'];
  $engArr = array();
  foreach ($eng as $val) {
   array_push($engArr,$val);
  }

  $hindi = $_POST['hindi'];
  $hindiArr = array();
  foreach ($hindi as $val) {
   array_push($hindiArr,$val);
  }

   
    for ($i=0; $i < $n; $i++) { 
      $q = "INSERT INTO `students` ( `name`, `regno`, `english`, `hindi`) VALUES ('$nameArr[$i]', '$regnoArr[$i]', '$engArr[$i]', '$hindiArr[$i]');";
      $res = mysqli_query($conn,$q);
      if(!$res){
        echo '<script>alert("Insertion in DB Failed")</script>';
      }
    }

}
}
require 'store.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>


    <div class="container">

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Launch demo modal
</button> -->

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit values</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="portal.php" method="post">
                            <input type="hidden" name="snoEdit" id="snoEdit">
                            <div class="mb-3 my-3">
                                <label for="nameEdit" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameEdit" name="nameEdit"
                                    aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3 my-3">
                                <label for="regnoEdit" class="form-label">Reg No</label>
                                <input type="number" class="form-control" id="regnoEdit" name="regnoEdit"
                                    aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3 my-3">
                                <label for="englishEdit" class="form-label">English</label>
                                <input type="text" class="form-control" id="englishEdit" name="englishEdit"
                                    aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3 my-3">
                                <label for="hindiEdit" class="form-label">Hindi</label>
                                <input type="text" class="form-control" id="hindiEdit" name="hindiEdit"
                                    aria-describedby="emailHelp" />
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="container my-4">
            <div class="container" style="background-color:lightyellow">
                <?php
    if($populate){
    for ($i=0; $i < $n; $i++) { 
      echo'<form action="portal.php" method="post">
      <h1>Student '.$i+1 .'</h1>
      <div class="mb-3 my-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name[]" aria-describedby="emailHelp" />
      </div>
      <div class="mb-3 my-3">
        <label for="regno" class="form-label">Reg No.</label>
        <input type="number" class="form-control" id="regno" name="regno[]" aria-describedby="emailHelp" />
      </div>
      <h3>Enter Marks</h3>
      <div class="mb-3 my-3">
      <label for="eng" class="form-label">English</label>
      <input type="text" class="form-control" id="eng" name="eng[]" aria-describedby="emailHelp" />
    </div>
      <div class="mb-3 my-3">
      <label for="hindi" class="form-label">Hindi</label>
      <input type="text" class="form-control" id="hindi" name="hindi[]" aria-describedby="emailHelp" />
    </div>';
  }
}?>
                <button type="submit" class="btn btn-primary">Submit</button> <a href="index.php"
                    class="btn btn-primary">New Form</a></form>
            </div>


        </div>
        <div class="container my-3">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Name</th>
                        <th scope="col">Reg No</th>
                        <th scope="col">English</th>
                        <th scope="col">Hindi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
  require 'dbconnect.php';

    $q = "Select * from students ";
    $res = mysqli_query($conn,$q);
    $srno = 1;
    while($row = mysqli_fetch_assoc($res)){
      echo '<tr>
      <th scope="row">'.$srno++.'</th>
      <td>'.$row['name'].'</td>
      <td>'.$row['regno'].'</td>
      <td>'.$row['english'].'</td>
      <td>'.$row['hindi'].'</td>
      <td><button class="btn btn-sm btn-primary edit" id='.$row['sno'].'>Edit</button>  <button class="btn btn-sm btn-primary delete" id=d'.$row['sno'].'> Delete</button></td>
    </tr>';
    }
  ?>
                </tbody>
            </table>
            <button class="btn btn-primary" id="turncate">Delete Bulk</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sdmodal">Select and delete</button>


            <div class="modal fade" id="sdmodal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Select</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="change.php" method="post">
                                <input type="hidden" name="slmodal" id="slmodalid" value="1">
                                <div class="mb-3 my-3">
                                    <?php
                require 'dbconnect.php';
                $q = "Select * from students";
                $res = mysqli_query($conn,$q);
                while($row = mysqli_fetch_assoc($res)){
                  echo '  <input class="my-3" type="checkbox" id="checkone" name="select[]" value="'.$row['sno'].'" />  '.$row['name'].'<br>';
                }
                ?>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
        
        <script>
        edits = document.getElementsByClassName('edit')
        Array.from(edits).forEach((element) => {
            element.addEventListener('click', (e) => {
                tr = e.target.parentNode.parentNode;
                name = tr.getElementsByTagName('td')[0].innerText;
                regno = tr.getElementsByTagName('td')[1].innerText;
                english = tr.getElementsByTagName('td')[2].innerText;
                hindi = tr.getElementsByTagName('td')[3].innerText;
                nameEdit.value = name;
                regnoEdit.value = regno;
                englishEdit.value = english;
                hindiEdit.value = hindi;
                snoEdit.value = e.target.id;

                var myModal = new bootstrap.Modal(document.getElementById('editModal'), {
                    keyboard: false
                })
                myModal.toggle()
            })
        })
        deletes = document.getElementsByClassName('delete')
        Array.from(deletes).forEach((element) => {
            element.addEventListener('click', (e) => {
                if (confirm("Are you sure to you want to delete ")) {
                    sno = e.target.id.substr(1, );
                    window.location = `/student/portal.php?delete=${sno}`
                }

            })
        })

        document.getElementById('turncate').addEventListener('click', () => {
            if (confirm("Are you sure to want to delete all data? 'BIG DECISION'")) {
                window.location = `/student/portal.php?turncate=true`;
            }
        })
        </script>
</body>

</html>