<div id="form-container">
    <?php if($success): ?>
        <div class="alert-success">
            <!-- if no issues, success message displayed -->
            <p>Your Order has been submitted!</p>
        </div>
    <?php endif; ?>
    <?php if(!empty($error)): ?>
        <!-- if issues found, alert-error displayed -->
        <div class="alert-error">
            <p>
                <?php echo htmlspecialchars($error); ?>
            </p>
        </div>
    <?php endif; ?>
    <!-- when form button is clicked, action will take you back to the form to see the success message -->
    <form method="post" action="#order">
        <!-- customer information section of the form -->
        <fieldset class="customer-info">
            <div>
                <p>Customer Information</p>
                <label for="customer_name">Name*</label>
                <br>
                <input type="text" name="customer_name" id="customer_name" required>
                <br>
                <label for="phone">Phone Number*</label>
                <br>
                <input type="tel" name="phone" id="phone" placeholder="123-456-7890" required>
                <br>
                <label for="email">Email</label>
                <br>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <!-- pickup/delivery section of the form -->
                <div>
                    <p>Select One:*</p>
                    <input type="radio" id="pickup" name="pickup_or_delivery" value="Pickup" checked>
                    <label for="pickup">Pickup</label>
                    <input type="radio" id="delivery" name="pickup_or_delivery" value="Delivery">
                    <label for="delivery">Delivery</label>
                </div>
                <br>
                <p>Delivery Information</p>
                <label for="address">Street Address</label>
                <br>
                <input type="text" name="address" id="address" placeholder="House Number & Street Name">
                <br>
                <label for="city">City</label>
                <br>
                <input type="text" name="city" id="city">
                <br>
                <label for="postal_code">Postal Code</label>
                <br>
                <input type="text" name="postal_code" id="postal_code">
            </div>
        </fieldset>
        <!-- specials section of the form -->
        <fieldset class="specials">
            <p>Choose from our Specials</p>
            <div class="specials-container">
                <div>
                    <label for="big_cheese">Big Cheese</label>
                    <br>
                    <label for="big_cheese">Size:</label>
                    <select name="big_cheese_size" id="big_cheese">
                        <option value="N/A">Select Size</option>
                        <option value="medium">Medium - $14.99</option>
                        <option value="large">Large - $18.99</option>
                    </select>
                    <label for="big_cheese_qty">Quantity: </label>
                    <input type="number" name="big_cheese_qty" min="0" max="10" id="big_cheese_qty" value="0">
                </div>
                <div>
                    <label for="pepperoni_party_size">Pepperoni Party</label>
                    <br>
                    <label for="pepperoni_party_size">Size:</label>
                    <select name="pepperoni_party_size" id="pepperoni_party_size">
                        <option value="N/A">Select Size</option>
                        <option value="medium">Medium - $15.99</option>
                        <option value="large">Large - $19.99</option>
                    </select>
                    <label for="pepperoni_party_qty">Quantity: </label>
                    <input type="number" name="pepperoni_party_qty" min="0" max="10" id="pepperoni_party_qty" value="0">
                </div>
                <div>
                    <label for="veggie_overload_size">Veggie Overload</label>
                    <br>
                    <label for="veggie_overload_size">Size:</label>
                    <select name="veggie_overload_size" id="veggie_overload_size">
                        <option value="N/A">Select Size</option>
                        <option value="medium">Medium - $17.99</option>
                        <option value="large">Large - $20.99</option>
                    </select>
                    <label for="veggie_overload_qty">Quantity: </label>
                    <input type="number" name="veggie_overload_qty" min="0" max="10" id="veggie_overload_qty" value="0">
                </div>
                <div>
                    <label for="bbq_chicken_kick_size">BBQ Chicken Kick</label>
                    <br>
                    <label for="bbq_chicken_kick_size">Size:</label>
                    <select name="bbq_chicken_kick_size" id="bbq_chicken_kick_size">
                        <option value="N/A">Select Size</option>
                        <option value="medium">Medium - $18.99</option>
                        <option value="large">Large - $21.99</option>
                    </select>
                    <label for="bbq_chicken_kick_qty">Quantity: </label>
                    <input type="number" name="bbq_chicken_kick_qty" min="0" max="10" id="bbq_chicken_kick_qty" value="0">
                </div>
            </div>
        </fieldset>
        <!-- build your own pizza section of the form -->
        <fieldset class="build-your-own">
            <p>Build Your Own Pizza</p>
            <div>
                <label for="pizza_size">Pizza Size</label>
                <select name="pizza_size" id="pizza_size">
                    <option value="N/A">Select a Size</option>
                    <option value="small">Small - $11.99</option>
                    <option value="medium">Medium - $12.99</option>
                    <option value="large">Large $15.49</option>
                </select>
            </div>
            <div>
                <label for="crust_type">Crust Type</label>
                <select name="crust_type" id="crust_type">
                    <option value="N/A">Select a Crust Type</option>
                    <option value="regular">Regular</option>
                    <option value="thin">Thin</option>
                    <option value="thick">Thick +1.50$</option>
                    <option value="stuffed">Stuffed Crust +3.00$</option>
                    <option value="gluten">Gluten-Free +$2.00$</option>
                </select>
            </div>
            <div>
                <label for="cheese_type">Cheese Type</label>
                <select name="cheese_type" id="cheese_type">
                    <option value="N/A">Select a Cheese Type</option>
                    <option value="mozzarella">Mozzarella</option>
                    <option value="feta">Feta</option>
                    <option value="cheddar">Cheddar</option>
                    <option value="parmesan">Parmesan</option>
                    <option value="vegan-cheese">Vegan Cheese +$1.50</option>
                    <option value="no-cheese">No Cheese</option>
                </select>
            </div>
            <div>
                <label>Proteins +$1.00 each</label>
                <br>
                <ul>
                    <li>
                        <input type="checkbox" id="pepperoni" name="proteins[]" value="Pepperoni">
                        <label for="pepperoni">Pepperoni</label>
                    </li>
                    <li>
                        <input type="checkbox" id="grilled-chicken" name="proteins[]" value="Grilled Chicken">
                        <label for="grilled-chicken">Grilled Chicken</label>
                    </li>
                    <li>
                        <input type="checkbox" id="bacon" name="proteins[]" value="Bacon">
                        <label for="bacon">Bacon Crumble</label>
                    </li>
                    <li>
                        <input type="checkbox" id="italian-ham" name="proteins[]" value="Italian Ham">
                        <label for="italian-ham">Italian Ham</label>
                    </li>
                    <li>
                        <input type="checkbox" id="anchovies" name="proteins[]" value="Anchovies">
                        <label for="anchovies">Anchovies</label>
                    </li>
                </ul>
            </div>
            <div>
                <label>Veggies +$0.50 each</label>
                <br>
                <ul>
                    <li>
                        <input type="checkbox" id="mushrooms" name="veggies[]" value="Mushrooms">
                        <label for="mushrooms">Mushrooms</label>
                    </li>
                    <li>
                        <input type="checkbox" id="onions" name="veggies[]" value="Onions">
                        <label for="onions">Onions</label>
                    </li>
                    <li>
                        <input type="checkbox" id="green-peppers" name="veggies[]" value="Green Peppers">
                        <label for="green-peppers">Green Peppers</label>
                    </li>
                    <li>
                        <input type="checkbox" id="tomatoes" name="veggies[]" value="Tomatoes">
                        <label for="tomatoes">Tomatoes</label>
                    </li>
                    <li>
                        <input type="checkbox" id="spinach" name="veggies[]" value="Spinach">
                        <label for="spinach">Spinach</label>
                    </li>
                    <li>
                        <input type="checkbox" id="olives" name="veggies[]" value="Olives">
                        <label for="olives">Olives</label>
                    </li>
                    <li>
                        <input type="checkbox" id="pineapple" name="veggies[]" value="Pineapple">
                        <label for="pineapple">Pineapple</label>
                    </li>
                    <li>
                        <input type="checkbox" id="artichokes" name="veggies[]" value="Artichokes">
                        <label for="artichokes">Artichokes</label>
                    </li>
                    <li>
                        <input type="checkbox" id="jalapenos" name="veggies[]" value="Jalapenos">
                        <label for="jalapenos">Jalapenos</label>
                    </li>
                </ul>
            </div>
            <div>
                <label for="build_your_own_qty">Quantity:</label>
                <input type="number" name="build_your_own_qty" id="build_your_own_qty" min="0" max="10" value="0">
            </div>
        </fieldset>
        <!-- payment information section of the form -->
        <fieldset class="payment-info">
            <p>Payment Information*</p>
            <input type="radio" id="cash" name="payment" value="Cash" checked>
            <label for="cash">Cash</label>
            <input type="radio" id="card" name="payment" value="Card">
            <label for="card">Card</label>
            <br>
            <label for="coupon_code">Coupon Code</label>
            <input type="text" name="coupon_code" id="coupon_code">
        </fieldset>
        <input id="submit-button" type="submit" value="Place Order">
    </form>
</div>
