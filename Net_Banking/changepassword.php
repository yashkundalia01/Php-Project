<?php 
  require_once('connections.php');
  session_start();
  

  if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
  $query = "SELECT * FROM client WHERE id=".$_SESSION['id'];
  $RESULT = $dbhandler -> query($query);
  $row = $RESULT->fetch();
  if($row['password'] != $_POST['op'])
  {
        header('location:changepassword.php?msg=old password does not match..');
  }
  else{
    $query = "UPDATE client SET Password='".$_POST['np']."' WHERE id=".$_SESSION['id'];
    $q=$dbhandler -> query($query); 
    header('location:login.php?message=password changed successfully');
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
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
        <a href="/accounts/dashboard/beneficiary/{{ client.id }}" class="w3-bar-item w3-button">Fund Transfer</a>
        <a href="/accounts/dashboard/history/{{ client.id }}" class="w3-bar-item w3-button">Transaction History</a>
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
              <a class="nav-link" href="/accounts/dashboard/{{ client.id }}">Home</a>
            </li>
            <div class="dropdown">
              <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                Payment
              </button>
              <div class="dropdown-menu">
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
                <a class="dropdown-item" href="#">Change password</a>
                <a class="dropdown-item" href="/accounts/dashboard/logout ">Logout</a>
              </div>
            </div>
          
          </ul>
        </nav>

        <div class="container-fluid">
            <h1 style="text-align: center;"><span class="badge bg-dark">Change Password</span></h1>
        <div class="row">
            <div class="col-md-4" style="position: absolute; left:32% ;"><br><br>
                <?php if(isset($_GET['msg']))
                {
                    echo $_GET['msg']."<br><br>";
                }
                ?>
                <br>
                <form method="POST" class="p-3 shadow">
                    <div class="form-group">
                        Old password: <input class="form-control" type="password" required name='op' placeholder="Enter a old password here.">
                    </div>
                    <br>
                    <div class="form-group">
                        New Password: <input class="form-control" type="password" required name="np" placeholder="Enter a new password here.">
                    </div>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-primary">
                    <input type="reset" class="btn btn-danger" value="Cancel">
                </form>

            </div>
        </div>
    </div>
</body>
</html>