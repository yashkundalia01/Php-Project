<?php
session_start();
require_once('connections.php');
if ((!isset($_POST['username']) || !isset($_POST['password'])) && (!isset($_COOKIE['password']))) {
  header("location:login.php?message=Please enter username and password");
} else {
  if (!isset($_COOKIE['password']))
    $query = "SELECT * FROM client WHERE username='" . $_POST['username'] . "'";
  else {
    $query = "SELECT * FROM client WHERE username='" . $_COOKIE['username'] . "'";
  }
  $RESULT = $dbhandler->query($query);
  $row = $RESULT->fetch();
  $password = $row['password'];
  $username = $row['username'];
  $amount = $row['account_balance'];
  $account_no = $row['account_no'];
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $id = $row['id'];
  $_SESSION['id'] = $id;
  if ((!isset($_COOKIE['username']) && !isset($_COOKIE['password']))) {
    if ($_POST['password'] == $password) {
    } else {
      header("location:login.php?message=Invalid username or password");
    }
  }
  setcookie('password', $password);
  setcookie('username', $username);
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

<body style="background-repeat: no-repeat; background-image:url('images/dashboard.jpg'); background-size:100%">

  <button class="w3-button w3-teal w3-black" onclick="w3_open()">☰</button>

  <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
    <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
    <a href="" class="w3-bar-item w3-button"><b>Payment</b></a>
	<a href="account_details.php" class="w3-bar-item w3-button">Account Details</a>
    <?php echo '<a class="w3-bar-item w3-button" href="beneficiary.php">Fund Transfer</a>'; ?>
    <a href="history.php" class="w3-bar-item w3-button">Transaction History</a>
    <a href="" class="w3-bar-item w3-button">Recharge</a>
    <a href="" class="w3-bar-item w3-button">UPI</a>
    <p></p>
    <a href="" class="w3-bar-item w3-button"><b>Quick links</b></a>
    <a href="" class="w3-bar-item w3-button">Credit card</a>
    <a href="" class="w3-bar-item w3-button">FD/RD</a>
    <a href="" class="w3-bar-item w3-button">Investment</a>
    <p></p>
    <a href="" class="w3-bar-item w3-button"><b>Products</b></a>
    <a href="" class="w3-bar-item w3-button">Loans</a>
    <a href="" class="w3-bar-item w3-button">Credit Cards</a>
    <a href="" class="w3-bar-item w3-button">Mutual fund</a>
    <p></p>
    <a href="" class="w3-bar-item w3-button"><b>Apply now</b></a>
    <a href="" class="w3-bar-item w3-button">Pre approved offers</a>
    <a href="" class="w3-bar-item w3-button">Top performing mutual funds</a>
    <a href="" class="w3-bar-item w3-button">Express FD</a>
    <a href="" class="w3-bar-item w3-button">Open access blog</a>
    <p></p>
    <a href="" class="w3-bar-item w3-button"><b>Services</b></a>
    <a href="" class="w3-bar-item w3-button">Debit card</a>
    <a href="" class="w3-bar-item w3-button">Cheque</a>
    <a href="" class="w3-bar-item w3-button">Contact RM</a>
    <a href="" class="w3-bar-item w3-button">My details</a>
    <p></p>
    <p></p>

  </div>


  <script>
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
    }
  </script>
  <div style="left:22%; top:10%; width: 55%; margin:auto ;position:absolute;">
    <div>
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
			<a class="dropdown-item" href="account_details.php">Account Details</a>
              <?php echo '<a class="dropdown-item" href="beneficiary.php">Fund Transfer</a>'; ?>
              <a class="dropdown-item" href="history.php">Transaction History</a>
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
              <a class="dropdown-item" href="changepassword.php">Change password</a>
              <?php echo ' <a class="dropdown-item" href="logout.php?id=' . $id . '">Logout</a>'; ?>
            </div>
          </div>
        </ul>
      </nav>
      <?php
      if (isset($_GET['message'])) {
        echo $_GET['message'];
      }
      ?>
      <h1 style="margin-left:10px ;"><b> Welcome <?php echo $first_name; ?><?php echo " " . $last_name; ?></b></h1><br>
    </div>
    <div style="margin: auto;" class="row">
      <div class="col-md-7">
        <div class="container">

          <ul class="list-group">
            <div id="accordion">
              <li class="list-group-item active">

                <a style="text-decoration: none; color:white;" data-toggle="collapse" href="#collapseOne">
                  Accounts
                </a>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <h6 style="margin-left:10px ;"><b>Account type:<font style="color:orange"> Saving</font><br><br>Account No:<font style="color:orange"> <?php echo $account_no; ?></font><br><br>Balance : <font style="color:#00FF00"><?php echo $amount; ?> &#8377 </font></b></h6>
                  </div>
                </div>

              </li>
              <li class="list-group-item">

                <a style="text-decoration: none;" class="collapsed" data-toggle="collapse" href="#collapseTwo">
                  Credit Cards
                </a>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                  Click <a href="">here</a> to apply now.
                  </div>
                </div>

              </li>
              <li class="list-group-item">

                <a class="collapsed" style="text-decoration: none;" data-toggle="collapse" href="#collapseThree">
                  Loans
                </a>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                  Click <a href="">here</a> to apply now.
                  </div>
                </div>

              </li>
              <li class="list-group-item">

                <a class="collapsed" style="text-decoration: none;" data-toggle="collapse" href="#collapseFour">
                  Deposits
                </a>
                <div id="collapseFour" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    Click <a href="">here</a> to apply now.
                  </div>
                </div>

              </li>
            </div>
          </ul>
          <br>
          <img height="180px" src="images/3.JPG">
          <img height="180px" src="images/4.JPG">
        </div>
      </div>
      <div class="col-md-2">
        <img src="images/1.JPG"><br>
        <img src="images/2.JPG">
      </div>
    </div>
  </div>


  <br><br>



</body>

</html>