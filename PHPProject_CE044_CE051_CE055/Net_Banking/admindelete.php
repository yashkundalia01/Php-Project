<?php
session_start();
    require_once('connections.php');
    if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
    {
         header("location:adminlogin.php?message=Please enter username and password");
    }
    if(isset($_POST['confirm']))
    {
    	$accno = $_POST['accno'];
    	try
    	{
       		$query = "DELETE FROM client where account_no='".$accno."'";
       		$row = $dbhandler -> exec($query);
     		header("location:admindashboard.php?message=Account removed"); 	
       	}
       	catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>re-confirmation</title>
</head>
<body>
<div class="w3-container w3-teal">
	<form action="admindelete.php" method="POST">
        <h3>
            Are you sure you want to stop Online NetBanking facilities?
        </h3>
        <br><br>
        <input type="hidden" name="accno" value="<?php echo $_POST['accno']; ?>">
        <input class="btn btn-primary"  type="submit" name="confirm" value="confirm">&nbsp &nbsp
        <a class="btn btn-danger" href="admindashboard.php">Cancel</a>
    </form>
	<br><br><p> </p>
</div>
</body>
</html>