<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/AC.css">
    <title>Order Dashboard</title>
</head>
<body background="Images/2.jpg">
    <header>
        <div class="logo">
            <img src="Images/Logo.jpg" alt="THE OUTER CLOVE RESTAURANT LOGO">
        </div>
        <h1>THE OUTER CLOVE RESTAURANT</h1>
        <nav>
            <ul>
                <li><a href="A_order.php">Orders</a></li>
                <li><a href="A_offers.php">Offers</a></li>
                <li><a href="A_Reservation.php">Reservation</a></li>
                <li><a href="A_contact.php">Contact</a></li>
                
            </ul>
        </nav>
    </header>

    <section class="order-dashboard">
        <h2>Order Offers Dashboard</h2>

        <?php
        include "conn.php";

        
        $sql = "SELECT * FROM offers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Dish</th>
                    <th>Quantity</th>
                    <th>Requests</th>
                </tr>
                </thead>
                <tbody>';

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['email']}</td>
                        <td>{$row['dish']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['requests']}</td>
                    </tr>";
            }

            echo '</tbody></table>';
        } else {
            echo "No order details found.";
        }

        $conn->close();
        ?>
    </section>

    <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qC4GDOEF9fQ6kXs1sMLd6ejk8hPzLTbl7IHaY1IbuXwgtFOA6DHDLE+HFW1EIVPi" crossorigin="anonymous"></script>
</body>
</html>


