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
<meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title></title>
</head>
<body>
	<form method="POST" action="<?php echo $target; ?>">
		Enter Account Number:<input type="number" name="accno" placeholder="Enter account number" required><br>
		<input type="submit" class="btn btn-primary" name="submit" value="submit">&nbsp
		<button class="btn btn-danger"><a href="admindashboard.php" style="text-decoration:none">Back</a></button>		
	</form>


</body>
</html>