<?php
session_start();
  require_once('connections.php');
$accno="";
$fname="";
$lname="";
$adno="";
$panno="";
$mob="";
  if (!isset($_SESSION['password'])){
    header("location:adminlogin.php?message=Please enter username and password");
  }elseif($_POST['submit'] == "submit"){
    $query = "SELECT * FROM client WHERE account_no='".$_POST['accno']."'";
    $RESULT = $dbhandler -> query($query);
    if($row = $RESULT->fetch())
    {
        $accno = $row['account_no'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $adno = $row['aadhaar_no'];
        $panno = $row['pan_no'];
        $mob = $row['mobile_no'];    
    }
    
  }

  if ($_POST['submit'] == "update")
  {
    $query1 = 'UPDATE client SET first_name = "'.$_POST['fname'].'", last_name="'.$_POST['lname'].'", aadhaar_no = "'. $_POST['aadhar'].'", pan_no = "'. $_POST['pan'].'", mobile_no = "'. $_POST['mobileno'].'"  WHERE account_no="'.$_POST['accno'].'"';
    $q=$dbhandler -> query($query1); 
    header("location:admindashboard.php?message=Account updated");  
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

    <div class="container-fluid">
        <h1 style="text-align: center;"><span class="badge bg-dark">Update Client</span></h1>
        <div class="row">
            <div class="col-md-4" style="margin: auto">
                <form action="adminupdate.php" method="POST" class="p-3 shadow">
                    <div class="form-group">
                        Account no : <input class="form-control" type="number" name='accno' value="<?php echo $accno; ?>" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        First name : <input class="form-control" type="text" required name='fname' placeholder="Enter a first name here." value="<?php echo $fname; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        Last name : <input class="form-control" type="text" required name="lname" placeholder="Enter a last name here." value="<?php echo $lname; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        AadharNo : <input class="form-control" type="text" required name='aadhar' placeholder="Enter aadharcard no." value="<?php echo $adno; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        PanNo : <input class="form-control" type="text" required name='pan' placeholder="Enter pan no." value="<?php echo $panno; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        Moblie no : <input class="form-control" type="number" required name='mobileno' placeholder="Enter an mobile no here." value="<?php echo $mob; ?>">
                    </div>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-primary" name="submit" value="update">
                    <a class="btn btn-danger" href="admindashboard.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>