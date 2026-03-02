<?php
include "../db.php";

$message = "";

$id = $_GET['id'];

$get = mysqli_query($conn, "SELECT * FROM students WHERE ID = $id");
$client = mysqli_fetch_assoc($get);

$message = "";

if (isset($_POST['update'])) {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
    } else {
    $sql = "UPDATE students
            SET student_id = '$student_id', full_name='$full_name', email='$email', course= '$course'
            WHERE ID=$id";
    mysqli_query($conn, $sql);
    header("Location: ../student_records.php");
    exit;
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"><title>Edit Student Record</title>
</head>
<body>

<div class="Container">
<h2>Edit Student Record</h2>
<p style="color:red;"><?php echo $message; ?></p>

<form method="post">
    <div>
    <label>ID Number</label><br>
    <input type="text" name= "student_id" placeholder="Please enter your ID Number"><br><br>
    </div>

    <div>
    <label>Name</label><br>
    <input type="text" name="full_name" placeholder="Please enter your Full Name"><br><br>
    </div>

    <div>
    <label>Email*</label><br>
    <input type="text" name="email" placeholder="Please enter your Email Address"><br><br>
    </div>

    <div>
    <label>Course</label><br>
    <input type="text" name="course" placeholder="Please enter your Course"><br><br>
    </div>

    <button type="submit" name="update">Add Student</button>
    <button type="submit" name="Cancel">Cancel</button>
</form>
</div>
</body>
</html>