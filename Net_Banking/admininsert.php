<?php
    session_start();
    require_once('connections.php');
    if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        if(isset($_POST['submit']))
        {
            try
            {
                $query1 = "INSERT INTO client (first_name,last_name,age,gender,account_no,aadhaar_no,pan_no,account_type,mobile_no,account_balance,username,password) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
                $i = $dbhandler -> prepare($query1);
                $i->bindparam(1,$fname,PDO::PARAM_STR);
                $i->bindparam(2,$lname,PDO::PARAM_STR);
                $i->bindparam(3,$age,PDO::PARAM_INT);
                $i->bindparam(4,$gender,PDO::PARAM_STR);
                $i->bindparam(5,$accno,PDO::PARAM_STR);
                $i->bindparam(6,$ano,PDO::PARAM_STR);
                $i->bindparam(7,$panno,PDO::PARAM_STR);
                $i->bindparam(8,$type,PDO::PARAM_STR);
                $i->bindparam(9,$mob,PDO::PARAM_STR);
                $i->bindparam(10,$bal,PDO::PARAM_INT);
                $i->bindparam(11,$uname,PDO::PARAM_STR);
                $i->bindparam(12,$pass,PDO::PARAM_STR);

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $accno = $_POST['accno'];
                $ano = $_POST['aadhaarno'];
                $panno = $_POST['panno'];
                $type = $_POST['acctype'];
                $mob = $_POST['mobileno'];
                $bal = $_POST['accbalance'];
                $uname = $_POST['username'];
                $pass = $_POST['password'];

                $i->execute();
                header("location:admindashboard.php?message=Account Created");  
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
    else
    {
        header("location:adminlogin.php?message=Please enter username and password");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <h1 style="text-align: center;"><span class="badge bg-dark">Add Client</span></h1>
        <div class="row">
            <div class="col-md-4" style="position: absolute; left:32% ;">
                <h4 style="text-align: center;">Application form</h4>
                <?php 
                    if (isset($_GET['message']))
                    {
                        echo $_GET['message'];
                    }
                ?>
                <form action="admininsert.php" method="POST" class="p-3 shadow">
                    <div class="form-group">
                        First name : <input class="form-control" type="text" required name='fname' placeholder="Enter a first name here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Last name : <input class="form-control" type="text" required name="lname" placeholder="Enter a last name here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Age : <input class="form-control" type="number" required name='age' placeholder="Enter an age here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Gender: <br>
                        <input type="radio" required name="gender" value="Male" id="Male">Male<br>
                        <input type="radio" required name="gender" value="Female" id="Female">Female<br>
                        <input type="radio" required name="gender" value="Other" id="Other">Other
                    </div>
                    <br>
                    <div class="form-group">
                        Account no : <input class="form-control" type="number" required name='accno' placeholder="Enter an account no here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Aadhaar no: <input class="form-control" type="number" required name="aadhaarno" placeholder="Enter a aadhaar card no here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Pancard no: <input class="form-control" type="text" required name='panno' placeholder="Enter a pan card no here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Account type: <input class="form-control" type="text" required name="acctype" placeholder="Enter an account type here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Account balance : <input class="form-control" type="number" required name="accbalance" placeholder="Enter an account balance here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Moblie no : <input class="form-control" type="number" required name='mobileno' placeholder="Enter an mobile no here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Username: <input class="form-control" type="text" required name='username' placeholder="Enter an username here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Password: <input class="form-control" type="password" required name="password" placeholder="Enter a password here.">
                    </div>
                    <br>
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary" value="submit">
                    <a class="btn btn-danger" href="admindashboard.php">Cancel</a>
                </form>
        
            </div>
        </div>
    </div>
</body>
</html>