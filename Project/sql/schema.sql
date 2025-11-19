CREATE TABLE Reclaim_admins (
    -- This table will be used to verify admin access. Record will be created when user registers for an admin account
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    age INT UNSIGNED NOT NULL,
    gender VARCHAR(30) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Reclaim_lost_items (
    -- This table will be used by admins to log items turned in, and will be used to display records of found items
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    found_item_name VARCHAR(120) NOT NULL,
    found_description TEXT NOT NULL,
    found_category ENUM('electronics','clothing','jewelry','ids','bags','keys','other') NOT NULL,
    location_found VARCHAR(120) NOT NULL,
    date_found DATE NOT NULL,
    found_image_path VARCHAR(255) NOT NULL,
    found_item_status ENUM('open','returned','archived') NOT NULL DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Reclaim_lost_reports (
    -- This table will store lost reports filled out by users
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    lost_item_name VARCHAR(120) NOT NULL,
    lost_category ENUM('electronics','clothing','jewelry','ids','bags','keys','other') NOT NULL,
    date_lost DATE NOT NULL,
    location_lost VARCHAR(120) NOT NULL,
    lost_description TEXT NULL,
    lost_proof_notes TEXT NULL,
    lost_image_path VARCHAR(255) NULL,
    lost_name VARCHAR(80) NOT NULL,
    lost_email VARCHAR(120) NOT NULL,
    lost_phone VARCHAR(40) NULL,
    lost_item_status ENUM('open','matched','archived') NOT NULL DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;