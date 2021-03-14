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
	<title></title>
</head>
<body>
	<form action="admindelete.php" method="POST">
        <h3>
            Are you sure you want to stop Online NetBanking facilities?
        </h3>
        <br><br>
        <input type="hidden" name="accno" value="<?php echo $_POST['accno']; ?>">
        <input type="submit" name="confirm" value="confirm">
        <a href="admindashboard.php">Cancel</a>
    </form>
</body>
</html>