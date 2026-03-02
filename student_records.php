<?php
session_start();

// If not logged in, redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

/* ============================
    SOFT DELETE
   ============================ */
if (isset($_GET['ID'])) {
    $delete_id = $_GET['ID'];

    mysqli_query($conn, "UPDATE students SET is_active = 0 WHERE ID = $delete_id");

    header("Location: student_records.php");
    exit;
}


$result = mysqli_query($conn, "SELECT * FROM students ORDER BY student_id DESC");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"><title>Student Records</title>
    <link rel="stylesheet" href="../Alzate_Lab_exam1/Styles/students_table.css">
    <link rel="stylesheet" href="../Alzate_Lab_exam1/Styles/style.css">
</head>
<body>

<div class="Container2">
<h2>Student Records</h2>
<p><a href="pages/create_student.php" class="add_btn">+ Add Student</a></p>

<table class="students_table">
    <tr>
    <th>student_id</th><th>Name</th><th>Email</th><th>Course</th><th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) {
        if ($row['is_active'] == 0) 
        continue;
    ?>
    <tr>
        <td><?php echo $row['student_id']; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td>
        <a href="pages/edit_student.php?id=<?php echo $row['ID']; ?>">Edit</a>

        <?php if ($row['is_active'] == 1) { ?>
        |
        <a href="student_records.php?ID=<?php echo $row['ID']; ?>"
            onclick="return confirm('Deactivate this student?')">
            Delete
        </a>
        <?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>
</div>
<div><a class="deactivate-btn logout" href="logout.php">Logout</a></div>
</body>
</html>