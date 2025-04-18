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
                   if (isset($_POST["submit"])){
                    $fullName= $_POST["fullname"];
                    $email= $_POST["email"];
                    $password= $_POST["password"];
                    $passwordRepeat= $_POST["repeat_password"];

                    $passwordHash = password_hash($password,PASSWORD_DEFAULT);

                    $errors = array();

                    if(empty($fullName)OR empty($email)OR empty($password)OR empty($passwordRepeat)){
                      array_push($errors,"All fields are required"); 
                    }
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        array_push($errors,"Email is not valid");
                    }
                    if(strlen($password)<8){
                        array_push($errors,"Password must be at least 8 charactes long");
                    }
                    if($password!==$passwordRepeat){
                        array_push($errors,"Password dies not match");
                    }
                    require_once "conn.php";
                    $sql = "SELECT * FROM customer WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);
                    if($rowCount>0){
                        array_push($errors,"Email already existsl");
                    }

                    if(count($errors)>0){
                        foreach($errors as $error ){
                            echo "<div class ='alet alert-danger'>$error</div>";
                        }
                    }else{
                        $sql ="INSERT INTO customer(full_name, email, password) VALUES (?,?,?)";
                        $stmt = mysqli_stmt_init($conn);
                        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                        if($prepareStmt){
                            mysqli_stmt_bind_param($stmt,"sss",$fullName,$email,$passwordHash);
                            mysqli_stmt_execute($stmt);
                            echo"<div class = 'alert alert-success'>You are registered successfully.</div.";
                        }else{
                            die ("Somthing went wrong");
                        }
                    }
                   }
                ?>
                <form action="Loginin.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
                    </div>
                    <div class="form-btn">
                         <input type="submit" class="btn btn-primary" value="Register" name="submit">
                    </div>
                </form>
                <div><p>Already Registered <a href="CustomerLogin.php">Login Here</a></p></div>
             </div>

             <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>