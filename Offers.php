<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Order.css">
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

    <section class="order-form">
    <?php
        include "conn.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $dish = $_POST["dish"];
            $quantity = $_POST["quantity"];
            $requests = $_POST["requests"];
           
            
            $sql= "INSERT INTO offers(email, dish, quantity, requests) 
                   VALUES ('$email','$dish', '$quantity', '$requests')";

            if($conn->query($sql)==TRUE){
            echo "<script>alert('Contact Placed!\\nQuantity: $quantity \\nRequests: $requests ');</script>";

        }else{
            echo "Error : " . $sql . "<br>" . $conn->error;
        }
    }  
                
        $conn->close();
?>
        <h2>Today Offers</h2>
        <form action="Offers.php" method="post">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="dish">Dish:</label>
            <select id="dish" name="dish" required>
                <optgroup label="PIZZA">
                    <option value="PIZZA">Spicy Chunks of Chicken Capsicums & Onions with a Double Layer of Cheese with FREE ONE Smoothie. Rs.1100</option>
                 
                </optgroup>

                <optgroup label="SEE FOOD WITH FRIED RICE">
                    <option value="SEE FOOD WITH FRIED RICE ">Basmati fried rice with eggs, prawns, cuttlefish, crab meat, carrots and spring onions with FREE ONE Iced Coffee. Rs.800</option>
                  
                </optgroup>

                <optgroup label="BUGERS">
                    <option value="BUGERS">Flame Broiled chicken breast, bacon, swiss cheese, guacamole, red onions, lettuce & tomato on a fresh baked deli bun with FREE ONE Large Hot Chocolate. Rs.1150</option>
                    
                </optgroup>

                
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>

            <label for="requests">Requests:</label>
            <textarea id="requests" name="requests" rows="4"></textarea>

            <button type="submit">Place Order</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>
