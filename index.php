<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location: CustomerLogin.php");
    header("location: C_order.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Loginin.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to The Outer Clove Restaurant! </h1>
        <a href="Home.php" class="btn btn-warning">Home</a>
        <a href="Logout.php" class="btn btn-warning">Logout</a>

    </div>

    <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>

</body>
</html>