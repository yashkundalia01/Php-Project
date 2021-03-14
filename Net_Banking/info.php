<?php
	$target="";
	if(isset($_REQUEST['operation']))
	{
		if($_REQUEST['operation'] === "delete")
		{
			$target = "admindelete.php";
		}
		elseif($_REQUEST['operation'] === "update")
		{
			$target = "adminupdate.php";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="<?php echo $target; ?>">
		Enter Account Number:<input type="number" name="accno" placeholder="Enter account number" required><br>
		<input type="submit" name="submit" value="submit">
		<a href="admindashboard.php"><button>Back</button></a>		
	</form>


</body>
</html>