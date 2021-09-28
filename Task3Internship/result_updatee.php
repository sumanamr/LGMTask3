<?php
include('connection.php');
if (isset($_POST['Roll'])) {
    $roll = $_POST['Roll'];
    $s1 = $_POST['subject1'];
    $s2 = $_POST['subject2'];
    $s3 = $_POST['subject3'];
    $s4 = $_POST['subject4'];
    $s5 = $_POST['subject5'];
    $s6 = $_POST['subject6'];
    $m1 = $_POST['marks1'];
    $m2 = $_POST['marks2'];
    $m3 = $_POST['marks3'];
    $m4 = $_POST['marks4'];
    $m5 = $_POST['marks5'];
    $m6 = $_POST['marks6'];
    $class = $_POST['Class'];

    if (empty($roll) or empty($class)   or empty($m1)  or empty($s1) or empty($m2)  or empty($s2) or empty($m3)  or empty($s3) or empty($m4)  or empty($s4) or empty($m5)  or empty($s5) or empty($m6)  or empty($s6)) {
        if (empty($roll))
            echo '<p class="error-s">Please enter Roll Number</p>';
        if (empty($class))
            echo '<p class="error-s">Please select Class</p>';
        if (empty($m1)  or empty($s1) or empty($m2)  or empty($s2) or empty($m3)  or empty($s3) or empty($m4)  or empty($s4) or empty($m5)  or empty($s5) or empty($m6)  or empty($s6))
            echo '<p class="error-s">Please enter all Subjects with their marks</p>';

        exit();
    }

    $sql = "UPDATE `results` SET `sub1`='$s1',`marks1`='$m1',`sub2`='$s2',`marks2`='$m2',`sub3`='$s3',`marks3`='$m3',`sub4`='$s4',`marks4`='$m4',`sub5`='$s5',`marks5`='$m5',`sub6`='$s6',`marks6`='$m6' WHERE `roll_no`='$roll' AND `class`='$class'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Failed to insert Details")';
        echo '</script>';
?>
        <script>
            window.location.replace("result_update.php");
        </script>
    <?php
    } else {
        echo '<script language="javascript">';
        echo 'alert("Result Updated Successfully")';
        echo '</script>';
    ?>
        <script>
            window.location.replace("result_update.php");
        </script>
<?php
    }
}

?>