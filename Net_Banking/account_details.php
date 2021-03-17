<?php
session_start();
  require_once('connections.php');

  if (!isset($_COOKIE['password'])){
    header("location:login.php?message=Please enter username and password");
  }else {
    $query = "SELECT * FROM client WHERE id=".$_SESSION['id'];
    $RESULT = $dbhandler -> query($query);
  }


?>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>account details</title>
</head>
</body>
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
      <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
      <a href="" class="w3-bar-item w3-button"><b>Payment</b></a>
	  <a href="#" class="w3-bar-item w3-button">Account Details</a>
      <a href="beneficiary.php" class="w3-bar-item w3-button">Fund Transfer</a>
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


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <button class="w3-button w3-teal w3-black" onclick="w3_open()">☰</button>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">Home</a>
          </li>
          <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
              Payment
            </button>
            <div class="dropdown-menu">
				<a class="dropdown-item" href="#">Account Details</a>
                <a class="dropdown-item" href="beneficiary.php">Fund Transfer</a>
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
              <?php echo '<a class="dropdown-item" href="logout.php">Logout</a>' ?>
            </div>
          </div>
        
        </ul>
      </nav>
<h4><b>Account Details</b></h4>
<table align="center">
                <?php
                while ($row = $RESULT -> fetch()){
                    $name = $row['first_name']." ".$row['last_name'];
                    $bank_name = $row['age'];
                    $branch_name = $row['gender']; 
                    $account_no = $row['account_no'];
                    $bank_ifsc_code = $row['aadhaar_no'];
                    $id = $row['id'];
                    echo '<div class="shadow card">';
                    echo '<div class="card-body">';
                    echo '<b><font style=color:red><h5 class="card-title">'.$name.'</font></b></h5>';
                    echo '<p><b>Account No:'.$account_no.'</b></p>';
                    echo ' <p><b>Age: '.$bank_name.'</b></p>';
                    echo '<p><b>Gender: '.$branch_name.'</b></p>';
                    echo '<p><b>Pan card number: '.$row['pan_no'].'</b></p>';
					echo '<p><b>Account Type : '.$row['account_type'].'</b></p>';
					echo '<p><b>Mobile Number  : '.$row['mobile_no'].'</b></p>';
					echo '<p><b>Account_balance  : <font style=color:#00FF00>'.$row['account_balance'].' ₹</font></b></p>';
					echo ' <a class="btn btn-primary" href="dashboard.php">DashBoard</a>';
                    /*echo ' <a class="btn btn-primary" href="transaction.php?account_no='.$account_no.'">Make Transaction</a>';
                    echo ' <a class="btn btn-success" href="updatebenificiary.php?account_no='.$account_no.'">Update</a>';
                    echo ' <a class="btn btn-danger" href="deletebeneficiary.php?account_no='.$account_no.'">Delete</a>';*/
                    echo '</div>';
                    echo '</div>';
                    echo '<br>';
                }
                ?>
				</table>
</body>
</html>