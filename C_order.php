<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
include("conn.php");

if(isset($_POST['Place_Order'])) {
    
    $dish = $_POST['dish'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $special_requests = $_POST['special_requests'];
    $email = $_POST['email'];

    $query = "INSERT INTO `order` (dish, size, quantity, special_requests, email) 
              VALUES ('$dish', '$size', $quantity, '$special_requests', '$email')";

    $result = mysqli_query($conn, $query);

    if($result) {
        echo "Order placed successfully!";
    } else {
        echo "Error placing order: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>



 
        <h2>Place Your Order</h2>
        <form action="C_order.php" method="post">
            <label for="dish">Dish:</label>
            <select id="dish" name="dish" required>

            <optgroup label="Smoothies">
                <option value="Smoothies">Banana, Strawberry, Low Fat Yogurt & Skim Milk</option>
                <option value="Smoothies">Mixed Berries, Almond Milk, Orange Juice & Honey</option>
                <option value="Smoothies">Kiwi, Banana, Strawberry, Almond Milk & Honey</option>
                <option value="Smoothies">Acai, Blueberry, Banana, Honey, Vanilla Yogurt, Almond Milk</option>
                <option value="Smoothies">Peanut Better, Banana, Chocolate Powder & Almond Milk</option>
                <option value="Smoothies">Strawberry, Banana, Low-Fat Yogurt & Skim Milk</option>
                
            </optgroup>

            <optgroup label="Tea & Coffee">
                <option value="Tea & Coffee">Iced Coffee</option>
                <option value="Tea & Coffee">Americano, Cappuccino, Latte</option>
                <option value="Tea & Coffee">Hot Chocolate</option>
                <option value="Tea & Coffee">Hot Espresso Coffee</option>
                <option value="Tea & Coffee">Hot Tea</option>
                <option value="Tea & Coffee">Lipton, Black, Herbal</option>
                <option value="Tea & Coffee">Iced Tea</option>
            </optgroup>

            <optgroup label="Breakfast">
                <option value="Breakfast">Two eggs on a Roll With bacon, ham, or sausage</option>
                <option value="Breakfast">Healthy Egg White Omelette with fresh vegetable on a Roll</option>
                <option value="Breakfast">Cheese or Western Omelette</option>
                <option value="Breakfast">Bagels add cream cheese spread and vegetables with salmon</option>
                <option value="Breakfast">Pancakes Three pancakes served with butter and syrup on the side</option>
                <option value="Breakfast">Grilled Cheese</option>
                <option value="Breakfast">Bacon, lettuce, and tomato</option>
            </optgroup>

            <optgroup label="Lunch">
                <option value="Lunch">Cheeseburger</option>
                <option value="Lunch">Cornbeef Reuben/or Pastrami</option>
                <option value="Lunch">Grilled chicken, iceberg lettuce, plum tomato, avocado, roasted pepper, and thousand island dressing on a whole wheat wrap</option>
                <option value="Lunch">Spicy chicken, blue cheese, romaine lettuce. carrots, and celery</option>
                <option value="Lunch">Chicken cutlet, American cheese, and tomato with ranch dressing on a wrap</option>
                <option value="Lunch">Grilled chicken, plum tomato, fresh mozzarella, arugula, tomato sauce</option>
                <option value="Lunch">Breaded chicken cutlet, fresh mozzarella, marinara sauce and fresh basil leaf on Italian bread</option>
            </optgroup>   

            <optgroup label="Dinner">
                <option value="Dinner">Grilled chicken, fresh mozzarella, garlic aioli, sweet peppers, arugula on toasted ciabatta bread</option>
                <option value="Dinner">Grilled spicy chicken, avocado, banana peppers, lettuce, tomato, onion, chipotle mayo on pressed hero</option>
                <option value="Dinner">Grilled chicken, mixed greens, lettuce, tomato, onion, avocado, balsamic vinaigrette, on homemade rustic artisan bread</option>
                <option value="Dinner">Fresh turkey, cheddar cheese, green apple, arugula, hummus on multigrain bread</option>
                <option value="Dinner">Mixed greens, sweet peppers, banana peppers, lettuce, tomato, onion avocado, chipotle mayo, whole wheat wrap</option>
                <option value="Dinner">Pepperoni, salami, ham capicola, provolone cheese, lettuce, tomato, onion, hot and sweet peppers, oil and vinegar on Italian hero</option>
                <option value="Dinner">Red cabbage pickle, lettuce, tomato, onion, dijonnaise dressing on toasted ciabatta bread</option>
            </optgroup>  

            <optgroup label="Seafood">
                <option value="Seefood">Smoked salmon & fresh greens</option>
                <option value="Seefood">Prawns in bloody mary shooters</option>
                <option value="Seefood">Scallops with white wine beurre blanc & truffle oil</option>
                <option value="Seefood">Prawns rolls & cheese straws with classic dipping</option>
                <option value="Seefood">Prawn bisque</option>
                <option value="Seefood">Roast baby potatoes</option>
            </optgroup>

            <optgroup label="Saleds">
                <option value="Saleds">Crisp greens, tomatoes, carrots, cucumber and red cabbage</option>
                <option value="Saleds">Romaine, shaved parmesan and herbed croutons</option>
                <option value="Saleds">Smoked turkey, roast beef, Swiss cheese, Virginia ham, hard boiled egg, tomato, and carrots</option>
                <option value="Saleds">Crisp lettuce, feta cheese, stuffed vine leaves, tomato, black olives, peppers, and onions</option>
                <option value="Saleds">Grilled chicken breast over crisp Caesar salad</option>
            </optgroup>

            <optgroup label="Snacks">
                <option value="Snacks">Gluten Free Bites</option>
                <option value="Snacks">Organic Soft Dried Fruit</option>
                <option value="Snacks">Dirty Potato Chips</option>
                <option value="Snacks">Pop Corners</option>
                <option value="Snacks">Cheese Crackers</option>
            </optgroup>

            <optgroup label="Cookie & Chocolate">
                <option value="Cookie & Chocolate">Chocolate Chip Cookie</option>
                <option value="Cookie & Chocolate">Warm chocolate chip cookie & ice cream</option>    
                <option value="Cookie & Chocolate">Organic Chocolate Bars</option> 
                <option value="Cookie & Chocolate">Cherry Chocolate Nut Cookie</option> 
                <option value="Cookie & Chocolate">Chippy Peanut Butter Cookies</option> 
            </optgroup>

        </select>

        <label for="size">Size:</label>
            <select id="size" name="size">
               <option value="regular" selected>Regular</option>
               <option value="large">Large</option>
               <option value="non">Non</option>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>

            <label for="special_requests">Special Requests:</label>
            <textarea id="special_requests" name="special_requests" rows="4"></textarea>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit" name="Place_Order">Place Order</button>

        </form>
    </section>



    <footer>
        <p>&copy; 2023 The Outer Clove Restaurant. All rights reserved.</p>
    </footer>
</body> 
</html>   