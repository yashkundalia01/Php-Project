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
      if($r = $RESULT->fetch())
      {
          $username = $r['username'];
          $password = $r['password'];
          $firstname = $r['firstname'];
          $lastname = $r['lastname'];
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
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
   
     
    <script>
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
    }
    
    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
    }
    </script>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link " href="#">Home</a>
          </li>
          <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
              Payment
            </button>
            <div class="dropdown-menu">
              <?php echo '<a class="dropdown-item" href="beneficiary.php?id='.$id.'">Fund Transfer</a>'; ?>
              <a class="dropdown-item" href="history/{{ client.id }}">Transaction History</a>
              <a class="dropdown-item" href="#">Recharge</a>
              <a class="dropdown-item" href="#">UPI</a>
            </div>
          </div>
          <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
              Quick links
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Credit card</a>
              <a class="dropdown-item" href="#">FD/RD</a>
              <a class="dropdown-item" href="#">Investment</a>
            </div>
          </div>
          <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
              Products
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Loans</a>
              <a class="dropdown-item" href="#">Credit card</a>
              <a class="dropdown-item" href="#">Mutual fund</a>
            </div>
          </div>
          <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
              Apply now
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Pre approved offers</a>
              <a class="dropdown-item" href="#">Top performing mutual funds</a>
              <a class="dropdown-item" href="#">Open access blog</a>
              <a class="dropdown-item" href="#">Express FD</a>
            </div>
          </div>
          <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
              Services
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Debit card</a>
              <a class="dropdown-item" href="#">Cheque</a>
              <a class="dropdown-item" href="#">Contact RM</a>
              <a class="dropdown-item" href="#">My details</a>
            </div>
          </div>
          <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
              Account
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Change password</a>
              <a class="dropdown-item" href="adminlogout.php">Logout</a>
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
    <h1 style="margin-left:10px ;"><b>  Welcome <u><?php echo $firstname." ".$lastname; ?></u></b></h1><br>
    <div>
      <a href="admininsert.php"><button>CREATE</button></a>
      <a href="info.php?operation=update"><button>UPDATE</button></a>
      <a href="info.php?operation=delete"><button>DELETE</button></a>
    </div>

</body>
</html>


