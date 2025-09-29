CREATE TABLE IF NOT EXISTS cheezyStreetPizzaOrders (
    -- NOTES:
    -- order_id will auto increment
    -- using TINYINT when holding small integer types
    -- using UNSIGNED to avoid negative values
    order_id INT AUTO_INCREMENT PRIMARY KEY,

    -- Customer Information
    customer_name VARCHAR(100) NOT NULL,
    phone VARCHAR(30),
    email VARCHAR(255),

    -- Pickup / Delivery Details
    pickup_or_delivery VARCHAR(30) NOT NULL,
    address VARCHAR(255),
    city VARCHAR(100),
    postal_code VARCHAR(30),

    -- Specials
    big_cheese_size VARCHAR(30),
    big_cheese_qty TINYINT UNSIGNED NOT NULL DEFAULT 0,
    pepperoni_party_size VARCHAR(30),
    pepperoni_party_qty TINYINT UNSIGNED NOT NULL DEFAULT 0,
    veggie_overload_size VARCHAR(30),
    veggie_overload_qty TINYINT UNSIGNED NOT NULL DEFAULT 0,
    bbq_chicken_kick_size VARCHAR(30),
    bbq_chicken_kick_qty TINYINT UNSIGNED NOT NULL DEFAULT 0,

    -- Build Your Own
    pizza_size VARCHAR(30),
    crust_type VARCHAR(30),
    cheese_type  VARCHAR(30),
    proteins VARCHAR(255),
    veggies VARCHAR(255),
    build_your_own_qty TINYINT UNSIGNED NOT NULL DEFAULT 0,

    -- Payment & Order Time Details
    payment VARCHAR(30) NOT NULL,
    coupon_code VARCHAR(30),
    ordered_at DATETIME DEFAULT CURRENT_TIMESTAMP
);