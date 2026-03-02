<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM students ORDER BY student_id DESC");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"><title>Student Records</title>
</head>
<body>


<h2>Student Records</h2>
<p><a href="pages/create_student.php" class="add_btn">+ Add Student</a></p>

<table boarder="1" cellpadding ="8">
    <tr>
    <th>student_id</th><th>Name</th><th>Email</th><th>Course</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['student_id']; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td>
        <a href="pages/edit_student.php?id=<?php echo $row['student_id']; ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>