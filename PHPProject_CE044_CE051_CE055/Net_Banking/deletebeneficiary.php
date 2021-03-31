<?php
    require_once('connections.php');

    if (!isset($_COOKIE['password'])){
      header("location:login.php?message=Please enter username and password");
    }
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      $query1 = 'DELETE FROM beneficiary WHERE account_no="'.$_GET['account_no'].'"';
      $q=$dbhandler -> query($query1); 
      header('location:beneficiary.php?id='.$_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="POST">

            <h3>
                Are you sure you want to delete this beneficiary?
            </h3>
            <br><br>
            <input class="btn btn-danger" type="submit" value="Confirm">
        </form>
</body>
</html>