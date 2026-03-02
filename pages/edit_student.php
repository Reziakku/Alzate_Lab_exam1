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
    <link rel="stylesheet" href="../Styles/create&edit.css">
</head>
<body>

<div class="Container">
<h2>Edit Student Record</h2>
<p style="color:red;"><?php echo $message; ?></p>

<form method="post">
    <div>
    <label>ID Number</label><br>
    <input type="text" name= "student_id" value="<?php echo $client['student_id']; ?>"><br><br>
    </div>

    <div>
    <label>Name</label><br>
    <input type="text" name="full_name" value="<?php echo $client['full_name']; ?>"><br><br>
    </div>

    <div>
    <label>Email*</label><br>
    <input type="text" name="email" value="<?php echo $client['email']; ?>"><br><br>
    </div>

    <div>
    <label>Course</label><br>
    <input type="text" name="course" value="<?php echo $client['course']; ?>"><br><br>
    </div>

    <button type="submit" name="update" class="add_student_btn">Update Student</button>
    <a href="../student_records.php" class="cancel_btn">Cancel</a>
</form>
</div>
</body>
</html>