<?php
  require_once('connections.php');
  session_start();

$query = "SELECT * FROM history WHERE client_id=".$_SESSION['id'];
  $RESULT = $dbhandler -> query($query);
  $rows = $RESULT->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
    <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
    <a href="" class="w3-bar-item w3-button"><b>Payment</b></a>
	<a href="account_details.php" class="w3-bar-item w3-button">Account Details</a>
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
		  <a class="dropdown-item" href="account_details.php">Account Details</a>
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

    <h1 style="text-align: center;"><span class="badge bg-dark">Transaction History</span></h1>
    <div class="card text-dark bg-light mb-3">
        <div class="card-body">
            <table style="border: 3px solid black;" class="table table-success table-striped shadow p-3 mb-5 bg-body rounded">
                <div>
                    <thead class="card-header">
                        <tr>
                            <th><b>Name</b></th>
                            <th><b>Account_No</b></th>
                            <th><b>Amount</b></th>
                            <th><b>Operation</b></th>
                            <th><b>Date</b></th>
                        </tr>
                    </thead>
                </div>
                <tbody>
                <?php 
                if($rows == null)
                {
                echo "<tr>";
                echo "<td colspan=5 align=center>no transaction done yet...</td>";
                echo '</tr>';
                }
                else{
                foreach($rows as $row){
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo '<td>'.$row['account_no'].'</td>';
						if($row['operation'] == 'c' || $row['operation'] == 'C'){
                        echo '<td><font style=color:green>'.$row['amount'].'</td>';
                        echo '<td>';
						echo "<font style=color:#00B31E>credited</font>";
                        }
                        else{
						echo '<td><font style=color:red>'.$row['amount'].'</td>';
                        echo '<td>';
                        echo "<font style=color:red>debited</font>";
                        }
                        echo '</td>';
                        echo '<td>'.$row['date'].'</td>';
                        echo '</tr>';
                    }
                    }
                    ?>
                </body>
            </table>
        </div>
    </div>
</body>
</html>