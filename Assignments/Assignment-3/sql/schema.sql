CREATE TABLE connectHub (
    -- NOTES:
    -- id will auto increment & is the primary key
    -- using UNSIGNED to avoid negative values
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    age INT UNSIGNED NOT NULL,
    gender VARCHAR(30) NOT NULL,
    bio VARCHAR(255) DEFAULT NULL,
    profile_pic_path VARCHAR(255) NOT NULL,
    join_date DATE DEFAULT (CURRENT_DATE)
);
