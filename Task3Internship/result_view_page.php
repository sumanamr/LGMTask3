<?php
session_start();
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View RESULT</title>
    <link rel="stylesheet" href="Styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <?php
    include("connection.php");

    if (!isset($_GET['class']))
        $class = null;
    else
    {
        $class = $_GET['class'];
        $rn = $_GET['roll'];
    }

    // validation
    if (empty($class) or empty($rn) or preg_match("/[a-z]/i", $rn)) {
        if (empty($class))
            echo '<p class="error">Please select class !</p>';
        if (empty($rn))
            echo '<p class="error">Please enter roll number !</p>';
        if (preg_match("/[a-z]/i", $rn))
            echo '<p class="error">Please enter valid roll number !</p>';
        echo '<p class="error-m">You will be auto redirected to previous page in 3 seconds.</p>';
    ?>
        <script>
            setTimeout(function() {
                window.location.href = 'result_view.php';
            }, 3000);
        </script>
    <?php
        exit();
    }

    $sql = mysqli_query($conn,"select id from classes where name = '$class' ");
    $sql2 = mysqli_fetch_array($sql);
    $classId = $sql2['id'];

    $name_sql = mysqli_query($conn, "SELECT `name` FROM `students` WHERE `roll_no`='$rn' and `class_id`='$classId'");
    while ($row = mysqli_fetch_assoc($name_sql)) {
        $name = $row['name'];
    }

    $result_sql = mysqli_query($conn, "SELECT * FROM `results` WHERE `roll_no`='$rn' and `CLASS`='$class'");
    while ($row = mysqli_fetch_assoc($result_sql)) {
        $p1 = $row['marks1'];
        $p2 = $row['marks2'];
        $p3 = $row['marks3'];
        $p4 = $row['marks4'];
        $p5 = $row['marks5'];
        $p6 = $row['marks6'];
        $s1 = $row['sub1'];
        $s2 = $row['sub2'];
        $s3 = $row['sub3'];
        $s4 = $row['sub4'];
        $s5 = $row['sub5'];
        $s6 = $row['sub6'];
        $total = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5;
        $total = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5;
        $percentage = $total / 5;
    }
    if (mysqli_num_rows($result_sql) == 0) {
        echo '<p class="error">Result not found !</p>';
        echo '<p class="error-m">You will be auto redirected to previous page in 3 seconds.</p>';
    ?>
        <script>
            setTimeout(function() {
                window.location.href = 'result_view.php';
            }, 3000);
        </script>
    <?php
        exit();
    }
    ?>

    <div class="wrapper">
        <?php
        include 'sidebar.php'
        ?>
        <div class="main_content">
            <?php include 'header.php'; ?>
            <div class="info">

                <div class="add-class" style="margin-top: 20px;">
                    <h1>Result</h1>
                    <form action="r_up.php" method="post">

                        <input class="text-input" type="text" name="Name" id="Stream" placeholder="Name" value="<?= $name; ?>" readonly>
                        <input class="sub-input" type="text" name="Total" id="Stream" placeholder="Enter Subject Name" value="Roll Number" readonly>
                        <input class="marks-input" type="number" name="marks4" id="Stream" placeholder="Marks" value="<?= $rn; ?>" readonly>
                        <input class="sub-input" type="text" name="Percentage" id="Stream" placeholder="Enter Subject Name" value="Class" readonly>
                        <input class="marks-input" type="text" name="marks5" id="Stream" placeholder="Marks" value="<?= $class; ?>" readonly>
                        <input class="sub-input" type="text" name="subject1" id="Stream" placeholder="Enter Subject Name" value="<?= $s1; ?>" readonly>
                        <input class="marks-input" type="number" name="marks1" id="Stream" placeholder="Marks" value="<?= $p1; ?>" readonly>
                        <input class="sub-input" type="text" name="subject2" id="Stream" placeholder="Enter Subject Name" value="<?= $s2; ?>" readonly>
                        <input class="marks-input" type="number" name="marks2" id="Stream" placeholder="Marks" value="<?= $p2; ?>" readonly>
                        <input class="sub-input" type="text" name="subject3" id="Stream" placeholder="Enter Subject Name" value="<?= $s3; ?>" readonly>
                        <input class="marks-input" type="number" name="marks3" id="Stream" placeholder="Marks" value="<?= $p3; ?>" readonly>
                        <input class="sub-input" type="text" name="subject4" id="Stream" placeholder="Enter Subject Name" value="<?= $s4; ?>" readonly>
                        <input class="marks-input" type="number" name="marks4" id="Stream" placeholder="Marks" value="<?= $p4; ?>" readonly>
                        <input class="sub-input" type="text" name="subject5" id="Stream" placeholder="Enter Subject Name" value="<?= $s5; ?>" readonly>
                        <input class="marks-input" type="number" name="marks5" id="Stream" placeholder="Marks" value="<?= $p5; ?>" readonly>
                        <input class="sub-input" type="text" name="Total" id="Stream" placeholder="Enter Subject Name" value="Total" readonly>
                        <input class="marks-input" type="number" name="marks4" id="Stream" placeholder="Marks" value="<?= $total; ?>" readonly>
                        <input class="sub-input" type="text" name="Percentage" id="Stream" placeholder="Enter Subject Name" value="Percentage" readonly>
                        <input class="marks-input" type="number" name="marks5" id="Stream" placeholder="Marks" value="<?= $percentage; ?>" readonly>

                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>