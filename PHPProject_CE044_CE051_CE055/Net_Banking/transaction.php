<?php
require_once('connections.php');
session_start();
if (!isset($_COOKIE['password'])) {
  header("location:login.php?message=Please enter username and password");
} else {
  $query = "SELECT * FROM beneficiary WHERE account_no=" . $_GET['account_no']." AND client_id=".$_SESSION['id'];
  $RESULT = $dbhandler->query($query);
  $row = $RESULT->fetch();
  $name = $row['name'];
  $account_no = $row['account_no'];
  $bank_name = $row['bank_name'];
  $bank_name = $row['bank_name'];
  $bank_branch = $row['bank_branch'];
  $bank_ifsc_code = $row['bank_ifsc_code'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $am = $_POST['amount'];
  $query = "SELECT * FROM client WHERE id=" . $_SESSION['id'];
  $RESULT = $dbhandler->query($query);
  $row = $RESULT->fetch();
  $amt = $row['account_balance'] - $am;
  if ($amt < 0) {
    header('location:beneficiary.php?msg=balance not present');
  } else {
    $query = "UPDATE   client SET account_balance = ?  WHERE id= ?";
    $q = $dbhandler->prepare($query);
    $q->execute(array($amt, $_SESSION['id']));
    $query = "INSERT INTO  History VALUES (?,?,?,?,?,?)";
    $q = $dbhandler->prepare($query);
    $q->execute(array($_POST['ahname'], $_POST['accno'], $am, "Debited", $_SESSION['id'], date('Y-m-d')));
    $query = "SELECT * FROM client WHERE account_no=" . $_POST['accno'];
    $RESULT = $dbhandler->query($query);
    $row1 = $RESULT->fetch();
    $amt = $row1['account_balance'] + $am;
    $query = "UPDATE   client SET account_balance = ?  WHERE account_no=? ";
    $q = $dbhandler->prepare($query);
    $q->execute(array($amt, $_POST['accno']));
    $query = "INSERT INTO history VALUES (?,?,?,?,?,?)";
    $q = $dbhandler->prepare($query);
    $q->execute(array($row['first_name'] . " " . $row["last_name"], $row['account_no'], $am, "credited", $row1['id'], date('Y-m-d')));

    $query = "SELECT * FROM client WHERE id=".$_SESSION['id'];
    $RESULT1 = $dbhandler->query($query);
    $row1 = $RESULT1->fetch();
    $accountNo = $row['account_no'];
  

    require_once __DIR__.'/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();

    $page = '
            <div>
                Transaction Successful
                <h2>Transaction Receipt</h2>
                
            
                <div>
                    <p style="text-align:right">Date: '.date('Y-m-d').'</p>
                    <lable style="text-color:blue">Dabit Account Details:</lable>
                    <br>
                    <table border="1">
                        
                        <tr>
                            <th>SBI Account No.</th>
                            <th>Account Type</th>
                            <th>Amount</th>
                            <th>Commission Amount</th>
                            <th>Transaction type</th>
                            <th>UTR Number</th>
                        </tr>
                        <tr>
                            <td>'.$accountNo.'</td>
                            <td>Saving</td>
                            <td>'.$am.'</td>
                            <td>0.0</td>
                            <td>NEFT</td>
                            <td>SBIN'.$_SESSION['id'].$_POST['accno'].$am.'</td>
                        </tr>

                    </table>
                    <br>
                    <lable style="color:blue">Credit Account Details:</lable>
                    <br>
                    <table border="1">
                        <tr>
                            <th>Account No.</th>
                            <th>Bank</th>
                            <th>Branch</th>
                            <th>Amount</th>
                            <th>Transaction type</th>
                        </tr>
                        <tr>
                            <td>'.$_POST['accno'].'</td>
                            <td>'.$_POST['bname'].'</td>
                            <td>'.$_POST['brname'].'</td>
                            <td>'.$am.'</td>
                            <td>NEFT</td>
                        </tr>
                    </table>
                    <br>
                    
                </div>
        
            </div>';

    $mpdf->WriteHTML($page);
    $mpdf->Output('payment.pdf', 'I');
    header("location:beneficiary.php?id=" . $_SESSION['id'] . "&msg=tansaction sucessfully");
  }
}
?>


    

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Title</title>
</head>

<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home</a>
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
          <a class="dropdown-item" href="changepassword.php">Change password</a>
          <?php echo '<a class="dropdown-item" href="logout.php">Logout</a>' ?>
        </div>
      </div>

    </ul>
  </nav>

  <div class="row">
    <div class="col-md-4" style="position: absolute; left:32% ;">
      <h1 style="text-align: center;"><span class="badge bg-dark">Fund Transfer</span></h1>
      <form method="post" class="p-3 shadow">

        <div class="form-group">
          Account Holder name: <input readonly class="form-control" value="<?php echo $name ?>" type="text" required name="ahname" placeholder="Enter an account holder's name here.">
        </div>
        <br>
        <div class="form-group">
          Account No: <input readonly class="form-control" value="<?php echo $account_no ?>" type="text" required placeholder="Enter an account number here." name="accno">
        </div>
        <br>
        <div class="form-group">
          Bank Name: <input readonly class="form-control" value="<?php echo $bank_name ?>" type="text" required name="bname" placeholder="Enter a bank name here.">
        </div>
        <br>
        <div class="form-group">
          Branch Name: <input readonly class="form-control" value="<?php echo $bank_branch ?>" type="text" required name="brname" placeholder="Enter a bank branch here.">
        </div>
        <br>
        <div class="form-group">
          Bank IFSC code: <input readonly class="form-control" value="<?php echo $bank_ifsc_code ?>" type="text" required name="ifsc" placeholder="Enter a bank IFSC code here.">
        </div>
        <br>
        <div class="form-group">
          Amount: <input class="form-control" type="number" required placeholder="Enter an amount here." name="amount">
        </div>
        <br>
        <input type="submit" class="btn btn-primary">
        <?php echo '<a class="btn btn-danger" href="beneficiary.php">Cancel</a>'; ?>
      </form>

    </div>
  </div>
</body>
</html>