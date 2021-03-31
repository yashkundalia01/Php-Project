<?php
session_start();
  require_once('connections.php');
  $username="";
  $password="";
  $firstname="";
  $lastname="";
  if(isset($_POST['uname']) && isset($_POST['pword']) && !isset($_SESSION['username']))
  {
      $query = "SELECT * FROM employee_details WHERE username='".$_POST['uname']."' and password='".$_POST['pword']."'";
      $RESULT = $dbhandler -> query($query);
      if( $r = $RESULT->fetch())
      {
          $username = $r['username'];
          $password = $r['password'];
          $_SESSION['admin_name']=$r['firstname']." ".$r['lastname'];
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
      }  
      else
      {
          header("location:adminlogin.php?message=Invalid username and password");     
      }    
  }
  elseif(!isset($_POST['uname']) && !isset($_POST['pword']) && !isset($_SESSION['username']))
  {
    header("location:adminlogin.php?message=Please enter username and password");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link " href="">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="admininsert.php">Create</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="info.php?operation=update">Update</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="info.php?operation=delete">Delete</a>
          </li>
          <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
              Account
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="adminlogin.php?message=logout successful">Logout</a>
            </div>
          </div>
        </ul>
      </nav>
      <?php
        if (isset($_GET['message'])){
          echo $_GET['message'];
        }
      ?>
    <br><br>
    <h1 style="margin-left:10px ;"><b>  Welcome <u><?php echo $_SESSION['admin_name']; ?></u></b></h1><br>
    <div>
      <a  class="btn btn-primary"  href="admininsert.php">CREATE</a>
      <a  class="btn btn-success"  href="info.php?operation=update">UPDATE</a>
      <a  class="btn btn-danger"  href="info.php?operation=delete">DELETE</a>
    </div>

</body>
</html>


