<?php
session_start();

// If already logged in, redirect to index
if (isset($_SESSION['username'])) {
    header("Location: student_records.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Static admin login
    if ($username === "admin" && $password === "admin") {

        $_SESSION['username'] = "ADMIN";
        header("Location: student_records.php");
        exit();

    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../Alzate_Lab_exam1/Styles/login_page.css">
</head>
<body>
<div class="Container">
<h2>Login Form</h2>

<?php if ($error != ""): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST">
    <div>
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>
    </div>

    <div>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    </div>

    <button type="submit" class="Login_btn">Login</button>
</form>
</div>
</body>
</html>