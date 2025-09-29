<?php
    // Linking the Config, Database, & PizzaOrders php files to index
    require_once "config.php";
    require_once "Database.php";
    require_once "PizzaOrders.php";
    
    // Connecting To The database
    $db = new Database();
    $pdo = $db->getConnection();
    $orderModel = new PizzaOrders($pdo);
    $success = false;
    $error = "";
    
    // Handling Form Submission 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // Customer Information
        $customer_name = trim($_POST["customer_name"] ?? "");
        $phone = trim($_POST["phone"] ?? "");
        $email = trim($_POST["email"] ?? "");
        // if no email provided, "None Provided" will be displayed
        $email = !empty($email) ? $email : "None Provided";

        // Pickup / Delivery Details
        $pickup_or_delivery = $_POST["pickup_or_delivery"] ?? "";
        $address = trim($_POST["address"] ?? "");
        $city = trim($_POST["city"] ?? "");
        $postal_code = trim($_POST["postal_code"] ?? "");

        // If order is being picked up the address, city & postal code variables will overwrite and display pickup since address details irrelevant for pickup
        $address = $pickup_or_delivery == "Pickup" ? "Pickup" : $address;
        $city = $pickup_or_delivery == "Pickup" ? "Pickup" : $city;
        $postal_code = $pickup_or_delivery == "Pickup" ? "Pickup" : $postal_code;

        // Specials
        $big_cheese_size  = $_POST["big_cheese_size"] ?? "";
        $big_cheese_qty   = (int)($_POST["big_cheese_qty"] ?? 0);

        // Logic: if one or more of the special pizzas are selected but no quantity selected then a quantity of 1 is assumed
        if ($big_cheese_size !== "N/A" && $big_cheese_qty == 0){
            $big_cheese_qty = 1;
        }

        $pepperoni_party_size = $_POST["pepperoni_party_size"] ?? "";
        $pepperoni_party_qty  = (int)($_POST["pepperoni_party_qty"] ?? 0);

        if ($pepperoni_party_size !== "N/A" && $pepperoni_party_qty== 0){
            $pepperoni_party_qty = 1;
        }

        $veggie_overload_size = $_POST["veggie_overload_size"] ?? "";
        $veggie_overload_qty  = (int)($_POST["veggie_overload_qty"] ?? 0);

        if ($veggie_overload_size !== "N/A" && $veggie_overload_qty == 0){
            $veggie_overload_qty = 1;
        }

        $bbq_chicken_kick_size = $_POST["bbq_chicken_kick_size"] ?? "";
        $bbq_chicken_kick_qty  = (int)($_POST["bbq_chicken_kick_qty"] ?? 0);

        if ($bbq_chicken_kick_size !== "N/A" && $bbq_chicken_kick_qty == 0){
            $bbq_chicken_kick_qty = 1;
        }

        // Build Your Own
        $pizza_size = $_POST["pizza_size"] ?? "";
        $cheese_type = $_POST["cheese_type"] ?? "";
        $crust_type = $_POST["crust_type"] ?? "";
        $proteinsArray = $_POST["proteins"] ?? [];
        $proteins = !empty($proteinsArray) ? implode(", ", $proteinsArray) : "No Proteins";
        $veggiesArray = $_POST["veggies"] ?? [];
        $veggies = !empty($veggiesArray) ? implode(", ", $veggiesArray) : "No Veggies";
        $build_your_own_qty = (int)($_POST["build_your_own_qty"] ?? 0);

        // Payment Details
        $payment = $_POST["payment"] ?? "Cash";
        $coupon_code = trim($_POST["coupon_code"] ?? "");
        $coupon_code = !empty($coupon_code) ? $coupon_code : "No Coupon";

        try{
            // try to create an order
            $orderModel->create($customer_name, $phone, $email, $pickup_or_delivery, $address, $city, $postal_code, $big_cheese_size, $big_cheese_qty, $pepperoni_party_size, $pepperoni_party_qty, $veggie_overload_size, $veggie_overload_qty, $bbq_chicken_kick_size, $bbq_chicken_kick_qty, $pizza_size, $cheese_type, $crust_type, $proteins, $veggies, $build_your_own_qty, $payment, $coupon_code);
            $success = true;
        } catch(Exception $e){
            $error = "Could not place order! " . $e->getMessage();
        }
    }
    // Adding The Header
    include './templates/header.php';
        ?>
        <main>
            <section class="hero">
                <h1>Cheezy Street Pizza</h1>
                <a href="#order">Order Now</a>
            </section>
            <section id="about" class="about-us split">
                <div>
                    <img src="./img/about-us.jpg" alt="Cheezy Street Pizza">
                </div>
                <div class="about-txt text-align">
                    <h2>Your Neighborhood Pizza Spot</h2>
                    <p>We’re not fancy. We’re just passionate about great pizza, friendly vibes, and making sure you never go hungry. From classic pepperoni to loaded meat lovers, every pizza is baked fresh and delivered hot to your door.</p>
                </div>
            </section>
            <section id="menu" class="menu">
                <h2>Menu</h2>
                <div class="pepperoni flex-column card">
                    <h3>Pepperoni Party</h3>
                    <h4>Crispy edges, cheesy goodness, and plenty of pepperoni.</h4>
                    <img src="./img/pepperoniparty.png" alt="Pepperoni Party Pizza">
                </div>
                <div class="cheese flex-column card">
                    <h3>The Big Cheese</h3>
                    <h4>For all the cheese lovers out there.</h4>
                    <img src="./img/thebigcheese.png" alt="The Big Cheese Pizza">
                </div>
                <div class="veggie flex-column card">
                    <h3>Veggie Overload</h3>
                    <h4>Fresh mushrooms, peppers, onions, and olives on top of our signature crust.</h4>
                    <img src="./img/veggieoverload.png" alt="Veggie Overload Pizza">
                </div>
                <div class="bbq flex-column card">
                    <h3>BBQ Chicken Kick</h3>
                    <h4>Sweet, smoky BBQ sauce, grilled chicken, and melty cheese.</h4>
                    <img src="./img/bbqchicken.png" alt="BBQ Chicken Kick Pizza">
                </div>
                <div class="custom-built flex-column card">
                    <h3>Custom Built</h3>
                    <h4>Choose your own toppings and make it exactly how you like it.</h4>
                    <img id="custom-built-img" src="./img/build-your-own.png" alt="Custom Built Pizza">
                </div>
            </section>
            <section id="order" class="order">
                <h2>Place An Order</h2>
                <!-- Adding the form-->
                <?php include 'form.php'?>
            </section>
        </main>
    <?php
    // Adding The Footer
    include './templates/footer.php';
?>
