<?php  

require_once __DIR__.'/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$page = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="row">
            <div class="col-md-4" style="position: absolute; left:32% ;">
                <h4 style="text-align: center;">Login</h4>
                
            
                <form action="admindashboard.php" method="POST" class="p-3 shadow">
                    <div class="form-group">
                        Username: <input class="form-control" type="text" required name="uname" placeholder="Enter a username here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Password: <input class="form-control" type="password" required name="pword" placeholder="Enter a password here.">
                    </div>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-primary">
                    <input type="reset" class="btn btn-danger" value="Cancel">
                </form>
        
            </div>
        </div>
</body>
</html>';

$mpdf->WriteHTML($page);

$mpdf->Output('demo.pdf', 'D');

?>