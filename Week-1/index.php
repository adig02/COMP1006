<?php
/**
 * This is how to do a block comment in PHP
 */
    echo "<h1>Introduction to web programming using PHP</h1>";
    echo "<h2>1. Variables and data Types</h2>";
    // A variable is a container for storing data. In PHP, variables start with a $
    $name = "Adi";
    $age = 23;
    $is_student = true;
    $pi = 3.14159;
    // the ' . ' is the concatenation operator, used to join strings together
    echo "<p>Hello my name is " . $name . "</p>";
    echo "<p>I am " . $age . " yrs old</p>";
    echo "<h2>2. Conditional Statements</h2>";

    echo "<h3>A simple if statement</h3>";
    $current_time = date("H");
    if ($current_time < 12){
        echo"<p>Good Morning</p>";
    }

    echo "<h3>If else</h3>";
    $temperature = 25;
    if ($temperature > 30){
        echo"<p>It is too damn hot</p>";
    } else {
        echo "<p>It is not too damn hot</p>";
    }

    echo "<h3>elseif</h3>";
    $grade = 85;
    if ($grade >= 90){
        echo "<p>Your grade is an A.</p>";
    } elseif ($grade >= 80){
        echo "<p>Your grade is an B.</p>";
    } else {
        echo "<p>You shouldn't have back talked to the teacher</p>";
    }

    echo "<h3>3. Loops</h3>";
    for ($i = 1; $i <= 5; $i++){
        echo $i . "<br>";
    }
    $j = 5;
    while ($j >= 1){
        echo $j . "<br>";
        $j--;
    }
    $fruits = ["Apple", "Banana", "Cherry"];
    foreach ($fruits as $fruit){
        echo $fruit . "<br>";
    }

    echo "<h3>4. Functions</h3>";
    function sayHello(){
        echo "<p>Hello World</p>";
    }
    // to run the function
    sayHello();
    function greet($person){
        echo "<p>Hello " . $person . "!</p>";
    }
    greet("Adi");
    // function with a return value
    function addNumbers($num1, $num2){
        $sum = $num1 + $num2;
        // the return keyword sends a value by the function to the place that it was called
        return $sum;
    }

    // we store the value returned by the function in a new variable called result
    $result = addNumbers(5, 7);
    echo "<p>The Sum of 5 + 7 is: " . $result . "</p>";

    // Bring it all together
    function getDailyMessage(){
        // get the date(W)
        $day_of_week = date("W");
        $message = "";
        // use a conditional statement to set the message based on the day
        if ($day_of_week == 6 || $day_of_week == 0){
            $message = "<p>It is the weekend</p>";
        } else {
            $message = "<p>Get to work</p>";
        }
        return $message;
    }
    echo "<p>" . getDailyMessage() . "</p>";
    // this is an array of "Associative arrays"
    $products = [
        ["name" => "Laptop", "price" => 1200],
        ["name" => "Mouse", "price" => 25],
        ["name" => "Keyboard", "price" => 75],
        ["name" => "Monitor", "price" => 300]
    ];
    echo "<h4>Products under 100</h4>";
    foreach ($products as $product){
        if ($product["price"] < 100){
            echo "<p>" . $product["name"] . " - $ " . $product["price"] . "</p>";
        }
    }
?>
