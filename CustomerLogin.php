<?php
session_start();
if(isset($_SESSION["user"])){
    header("location: index.php");
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
<body background="Images/1.jpg">
<header>
        <div class="logo">
            <img src="Images/Logo.jpg" alt="THE OUTER CLOVE RESTAURANT LOGO">
        </div>
        <h1>THE OUTER CLOVE RESTAURANT</h1>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Menu.php">Menu</a></li>
                <li><a href="CO_login.php">Order</a></li>
                <li><a href="Reservation.php">Reservation</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="CustomerLogin.php">Login in</a></li>
            </ul>
        </nav>
       </header>
       <div class="container">
        <?php
            if(isset($_POST["login"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
                require_once "conn.php";
                $sql = "SELECT * FROM customer WHERE email = '$email'";
                $result = mysqli_query($conn,$sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($user){
                    if(password_verify($password,$user["password"])){
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: index.php");
                        die();
                    }else{
                        echo"<div class = 'alert alert-danger'>Password does not match</div>";
                    }
                }else{
                    echo"<div class = 'alert alert-danger'>Email does not match</div>";
                }
            }
        ?>
       <form action="CustomerLogin.php" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                    <div class="form-btn">
                        <input type="submit" value="Login" class="btn btn_primary" name="login">
                    </div>
       </form>
       <div><p>Not registered yet <a href="Loginin.php">Register Here</a></p></div>
       </div>

       <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>
    
</body>
</html>       