<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Latest compiled and minified CSS -->
    <link href="login.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</head>
<body>
  <?php 
     include 'header.php'
     ?>

     <br><br>
  
    <h1 style="margin-left: 41%;">Student Result Page</h1>
    <br>
    <br>

    <div class="container-fluid">

   
<div class="col-md-4-col-sm-4-col-xs-12">

  <form class="form-container" style="width:400px;height: 350px;padding: 60px 60px;margin-left:38%;font-size: 20px;" action="student_result.php" method="GET">

<div class="form-group">
<label for="class">RESULT</label>
<br>
<?php
                    include('connection.php');

                    $class_result = mysqli_query($conn, "SELECT `name` FROM `classes`");
                    echo '<select name="class">';
                    echo '<option selected disabled>Select Class</option>';
                    while ($row = mysqli_fetch_array($class_result)) {
                        $display = $row['name'];
                        echo '<option value="' . $display . '">' . $display . '</option>';
                    }
                    echo '</select>'
                    ?>
</div>
<div class="form-group">
<label for="roll">Roll number: </label>
<input type="text" class="form-control" placeholder="Enter roll number" style="width:300px" name="roll" value="" />
</div>

<button type="submit" class="btn btn-success btn-block" style="width:300px" name="Submit">Submit</button>
</form>

</div>



   

</body>  
</html>
