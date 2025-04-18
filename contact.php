<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/contact.css">
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
     
       <section class="contact-us">
        <h2>Contact Us</h2>
        <?php
        include "conn.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $massage = $_POST["massage"];
           
            
            $sql= "INSERT INTO contact(name, email, massage) 
                   VALUES ('$name', '$email','$massage')";

            if($conn->query($sql)==TRUE){
            echo "<script>alert('Contact Placed!\\nMassege: $massage');</script>";

        }else{
            echo "Error : " . $sql . "<br>" . $conn->error;
        }
    }  
                
        $conn->close();
?>
        <div class="contact-content">
            <p>We would love to hear from you! Please use the form below to get in touch with us for any inquiries or feedback.</p>
        </div>
        <div class="contact-form">
            <form action="#" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="massage">Massage:</label>
                <textarea id="massage" name="massage" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    
        <div class="contact-content">
            <p>Email: info@outercloverestaurant.com</p>
            <p>Phone: +94 (81)123-4567</p>
            <div class="image-container"><img src="Images/facebook.jpg" alt="Description of the image" class="img"><p class="image-text">Outer Clove</p></div>
            <div class="image-container"><img src="Images/instagram.jpg" alt="Description of the image" class="img"><p class="image-text">outer_clove</p></div>
          </div>
       </section>

    

    <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>
           
</body>
</html>