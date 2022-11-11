<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  session_start();
  $studentNum = $_POST['studentNum']; 
  $_SESSION['studentNum'] = $studentNum;
  header('location: portal.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>
  <div class="container">
    <form action="index.php" method="post">
      <div class="mb-3 my-3">
        <label for="studentNum" class="form-label">Enter number of students</label>
        <input type="number" class="form-control" min="0" id="studentNum" name="studentNum" aria-describedby="emailHelp" />
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
</body>

</html>