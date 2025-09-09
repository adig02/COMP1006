<?php

echo "<h1>Week One Exercises | COMP1006</h1>";

echo "<h2>1. Write a PHP script that:<br>
   - Stores your name, age, and whether you are a student in variables.<br>
   - Prints them out in a readable sentence.</h2>";

$name = "Adi";
$age = 23;
$is_student = false;
$status = $is_student ? "are a student" : "are not a student";

echo "<p>Your Name is {$name}, and you are currently {$age} years old. You {$status} at georgian college.</p>";

// --------------------------------------------------------------------------------------------------------------------

echo "<h2>2. Create variables for the price of 3 items and calculate the total cost.<br></h2>";

$apple_price = 2.99;
$banana_price = 1.99;
$orange_price = 3.99;
$total_price = $apple_price + $banana_price + $orange_price;

echo "<p>Your total bill comes to: {$total_price}$</p>";

// --------------------------------------------------------------------------------------------------------------------

echo "<h2>3. Write a script that:<br>
   - Stores your first name and last name in two variables.<br>
   - Combines them into a full name and outputs: 'Hello, my name is John Doe!'</h2>";

$f_name = "Adi";
$l_name = "Gershman";
$full_name = $f_name . " " . $l_name;
// OR $full_name = "{$f_name} {$l_name}";

echo "<p>Hello {$full_name}.</p>";

// --------------------------------------------------------------------------------------------------------------------

echo "<h2>4. Create a script that checks the current hour:<br>
   - If it’s before 12:00 → print 'Good Morning'<br>
   - If it’s between 12 and 18 → print 'Good Afternoon'<br>
   - Otherwise → print 'Good Evening'
</h2>";

//Set the timezone
date_default_timezone_set("America/Toronto");

//$current_hour = date("H");
$current_hour = date("H");

if ($current_hour < 12){
    echo "<p>Good Morning</p>";
}
elseif ($current_hour > 12 && $current_hour < 18){
    echo "<p>Good Afternoon</p>";
}
else{
    echo "<p>Good Evening</p>";
}

// --------------------------------------------------------------------------------------------------------------------





?>
