<?php
session_start();
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ADD STUDENT</title>
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
        <?php include 'header.php' ?>
            <div class="info">

                <div class="add-class">
                    <h1>Add student</h1>
                    <form action="" method="post">
                        <?php
                        include('connection.php');

                        $class_result = mysqli_query($conn, "SELECT `name` FROM `classes`");
                        echo '<select name="class">';
                        echo '<option selected disabled>Select Stream</option>';
                        while ($row = mysqli_fetch_array($class_result)) {
                            $display = $row['name'];
                            echo '<option value="' . $display . '">' . $display . '</option>';
                        }
                        echo '</select>'
                        ?>
                        <input class="text-input" type="text" name="student_name" placeholder="Enter Name">
                        <input class="text-input" type="text" name="roll_no" placeholder="Enter Roll Number"><br>
                        <input class="button" type="submit" value="Add Student">
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
<?php

if (isset($_POST['student_name'], $_POST['roll_no'])) {
    $name = $_POST['student_name'];
    $rno = $_POST['roll_no'];
    if (!isset($_POST['class']))
        $class_name = null;
    else{
        $class_name = $_POST['class'];
        $sql = mysqli_query($conn,"select id from classes where name = '$class_name' ");
        $sql2 = mysqli_fetch_array($sql);
        $classId = $sql2['id'];
    }

    // validation
    if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i", $rno) or !preg_match("/^[a-zA-Z ]*$/", $name)) {
        if (empty($name))
            echo '<p class="error-s">Name not entered!!</p>';
        if (empty($class_name))
            echo '<p class="error-s">Please enter class!!</p>';
        if (empty($rno))
            echo '<p class="error-s">Please enter roll number!!!</p>';
        if (preg_match("/[a-z]/i", $rno))
            echo '<p class="error-s">Please enter valid roll number!!!</p>';
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo '<p class="error-s">No numbers or symbols allowed in name!!!</p>';
        }
        exit();
    }

    $sql = "INSERT INTO `students` (`name`, `roll_no`, `class_id`) VALUES ('$name', '$rno', '$classId')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Invalid Details")';
        echo '</script>';
?>
        <script>
            window.location.replace("student_add.php");
        </script>
    <?php
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successful")';
        echo '</script>';
    ?>
        <script>
            window.location.replace("student_add.php");
        </script>
<?php
    }
}
?>