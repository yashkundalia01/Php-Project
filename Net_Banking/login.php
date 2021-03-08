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
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="banner" style=" text-align:center; ;background-color: rgb(27, 29, 29); width:100%; height:100px; margin-bottom: 50px; margin-top: 10px; ">
                    <div class="banner-text" style="color: white; top: 35px; left:45%; position:absolute" >
                        <h1>Net banking</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="position: absolute; left:32% ;">
                <h4 style="text-align: center;">Login</h4>
                <?php 
                    if (isset($_GET['message'])){
                        echo $_GET['message'];
                    }
                ?>
                <form action="dashboard.php" method="POST" class="p-3 shadow">
                    <div class="form-group">
                        Username: <input class="form-control" type="text" required name='username' placeholder="Enter a username here.">
                    </div>
                    <br>
                    <div class="form-group">
                        Password: <input class="form-control" type="password" required name="password" placeholder="Enter a password here.">
                    </div>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-primary">
                    <input type="reset" class="btn btn-danger" value="Cancel">
                </form>
        
            </div>
        </div>
    </div>
</body>
</html>