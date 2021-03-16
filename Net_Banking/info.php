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
		<button><a href="admindashboard.php" style="text-decoration: none; color: black;">Back</a></button>
	</form>

</body>
</html>