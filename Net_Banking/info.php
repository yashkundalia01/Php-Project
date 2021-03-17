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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title></title>
</head>
<body>
	<form method="POST" action="<?php echo $target; ?>">
<!--		Enter Account Number:<input type="number" name="accno" placeholder="Enter account number" required><br>
		<input type="submit" name="submit" value="submit">		
		<button><a href="admindashboard.php" style="text-decoration: none; color: black;">Back</a></button>-->
		<div class="w3-container w3-teal">
  <h4>UPDATE PORTAL</h4><br>
  <b>Enter Account Number : </b><input type="number" name="accno" placeholder="Enter account number" required><br><br>
  <input class="btn btn-primary" type="submit" name="submit" value="submit">		&nbsp &nbsp &nbsp
<a class="btn btn-danger" href="admindashboard.php" style="text-decoration: none; color: black;">Back</a>
		<br><br><p> </p>
</div>
	</form>

</body>
</html>