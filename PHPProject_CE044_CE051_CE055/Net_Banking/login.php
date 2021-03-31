<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="background-repeat: no-repeat; background-image:url('images/login.jpg'); background-size:100%">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-2" style="margin:auto;">
                
                <form style="top:20%; position:absolute ;background-color:rgba(28, 57, 185, 0.692);"   action="dashboard.php" method="POST" class="p-3 shadow">
                    <h4 style="text-align: center;"><label style="color: white;">Login</label></h4>
                    <?php 
                    if (isset($_GET['message'])){
                        echo '<h6 style="color:white;">'.$_GET['message'].'</h6>';
                    }
                    ?>
                    <div class="form-group">
                        <label style="color: white;"><b>Username:</b> </label><input class="form-control" type="text" required name='username' placeholder="Enter a username here.">
                    </div>
                    <br>
                    <div class="form-group">
                        <label style="color: white;"><b>Password:</b> </label> <input class="form-control" type="password" required name="password" placeholder="Enter a password here.">
                    </div><br>
					<div>
					<label style="color: white;">For admin login click <a href="adminlogin.php">here</a></label>
					</div>
                    <br>
                    <input style="margin-left: 30px;" type="submit" class="btn btn-primary">
                    <input type="reset" class="btn btn-danger" value="Cancel">
                </form>
        
            </div>
        </div>
    </div>
</body>
</html>