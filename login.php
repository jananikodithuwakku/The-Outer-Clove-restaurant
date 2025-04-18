<?php
session_start();

$hostName ="localhost";
$dbuser = "Customer";
$dbPassword ="Restaurant20";
$dbName = "outer_clove_restaurant";

$conn = mysqli_connect($hostName, $dbuser, $dbPassword, $dbName);

if (!$conn) {
    die("Something went wrong;");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/A_login.css">
    <title>Login</title>
</head>
<body background="Images/2.jpg">
<div class="container">
    <h2>Login</h2>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
     
    <form action="login.php" method="post">
            <div class="form-group">
                <input type="name" class="form-control" name="username" placeholder="User Name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" class="btn btn_primary" name="login">
            </div>
    </form>
</div>
    <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>
