<?php
    class PizzaOrders{
        private $pdo;
        public function __construct($pdo){
            $this->pdo = $pdo;
        }
        public function create($customer_name, $phone, $email,
                               $pickup_or_delivery, $address, $city, $postal_code,
                               $big_cheese_size, $big_cheese_qty,
                               $pepperoni_party_size, $pepperoni_party_qty,
                               $veggie_overload_size, $veggie_overload_qty,
                               $bbq_chicken_kick_size, $bbq_chicken_kick_qty,
                               $pizza_size, $crust_type, $cheese_type, $proteins, $veggies, $build_your_own_qty,
                               $payment, $coupon_code){
            $sql = "INSERT INTO cheezyStreetPizzaOrders (
            customer_name, phone, email,
            pickup_or_delivery, address, city, postal_code,
            big_cheese_size, big_cheese_qty,
            pepperoni_party_size, pepperoni_party_qty,
            veggie_overload_size, veggie_overload_qty,
            bbq_chicken_kick_size, bbq_chicken_kick_qty,
            pizza_size, crust_type, cheese_type, proteins, veggies, build_your_own_qty,
            payment, coupon_code) 
            
            VALUES (
            :customer_name, :phone, :email,
            :pickup_or_delivery, :address, :city, :postal_code,
            :big_cheese_size, :big_cheese_qty,
            :pepperoni_party_size, :pepperoni_party_qty,
            :veggie_overload_size, :veggie_overload_qty,
            :bbq_chicken_kick_size, :bbq_chicken_kick_qty,
            :pizza_size, :crust_type, :cheese_type, :proteins, :veggies, :build_your_own_qty,
            :payment, :coupon_code)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ":customer_name" => $customer_name, ":phone" => $phone, ":email" => $email,
                ":pickup_or_delivery" => $pickup_or_delivery, ":address" => $address, ":city" => $city, ":postal_code" => $postal_code,
                ":big_cheese_size" => $big_cheese_size, ":big_cheese_qty" => $big_cheese_qty,
                ":pepperoni_party_size" => $pepperoni_party_size, ":pepperoni_party_qty" => $pepperoni_party_qty,
                ":veggie_overload_size" => $veggie_overload_size, ":veggie_overload_qty" => $veggie_overload_qty,
                ":bbq_chicken_kick_size" => $bbq_chicken_kick_size, ":bbq_chicken_kick_qty" => $bbq_chicken_kick_qty,
                ":pizza_size" => $pizza_size, ":crust_type" => $crust_type, ":cheese_type" => $cheese_type, ":proteins" => $proteins, ":veggies" => $veggies, ":build_your_own_qty" => $build_your_own_qty,
                ":payment" => $payment, ":coupon_code" => $coupon_code
            ]);
        }
    }
?>