<?php
session_start();
include('session.php');
?>
<?php
include("connection.php");

$no_of_classes = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `classes`"));
$no_of_students = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `students`"));
$no_of_result = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `results`"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

    <div class="wrapper">
        <?php
        include 'sidebar.php'
        ?>
    
        <div class="main_content">
            
            <div class="info">
                   <?php include 'header.php' ?>
                   <br>
                   <br>
                   <center><h1 style="color:black">WELCOME</h1></center>
                   
                <div class="add-class">
                    <?php
                    echo '<p>Number of Classes: ' . $no_of_classes[0] . '</p>';
                    echo '<p>Number of Students: ' . $no_of_students[0] . '</p>';
                    echo '<p>Number of Results: ' . $no_of_result[0] . '</p>';
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>