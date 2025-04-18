<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "CSS/Reservation.css">
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
        <h1>Reservation Form</h1>
        <?php
        include "conn.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $date = $_POST["date"];
            $time = $_POST["time"];
            $location = $_POST["location"];
            
            $sql= "INSERT INTO reservation(name, email, date, time, location) 
                   VALUES ('$name', '$email','$date','$time','$location')";

            if($conn->query($sql)==TRUE){
            echo "<script>alert('Reservation Placed!\\nDate: $date\\ nTime : $time\\ nLocation : $location');</script>";

        }else{
            echo "Error : " . $sql . "<br>" . $conn->error;
        }
    }  
                
        $conn->close();
?>

        
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="location">Location:</label>
            <select id="location" name="location" required>
                <option value="dine-in">Dine-In</option>
                <option value="takeout">Takeout</option>
                <option value="delivery">Delivery</option>
            </select>

            <button type="submit">Reserve Now</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>
    
</body>
</html>