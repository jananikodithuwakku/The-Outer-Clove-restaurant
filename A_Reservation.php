<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/AC.css">
    <title>Reservation Dashboard</title>
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

    <section class="reservation_ashboard">
        <h2>Reservation Dashboard</h2>

        <?php
        include "conn.php";

        
        $sql = "SELECT * FROM reservation";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                </tr>
                </thead>
                <tbody>';

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['time']}</td>
                        <td>{$row['location']}</td>
                    </tr>";
            }

            echo '</tbody></table>';
        } else {
            echo "No reservations found.";
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

