<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login Page</title>
    <!-- Latest compiled and minified CSS -->
    <link href="login.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>
<body>
  <?php 
     include 'header.php'
     ?>

     <br><br>
  
    <h1 style="margin-left: 41%;">Admin Login Page</h1>
    <br>
  
    <div class="container-fluid">

   
    <div class="col-md-4-col-sm-4-col-xs-12">
  
      <form class="form-container" style="width:400px;height: 350px;padding: 60px 60px;margin-left:38%;font-size: 20px;" action="loginValidate.php" method="POST">

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" placeholder="Username" style="width:300px" name="username" value="" />
  </div>
  <div class="form-group">
    <label for="password">Password</label>
<input type="password" class="form-control" placeholder="Password" style="width:300px" name="password" value="" />
  </div>
  
  <button type="submit" class="btn btn-success btn-block" style="width:300px" name="Submit">Submit</button>
</form>

    </div>


  </body>
  
</html>
