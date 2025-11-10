# Reclaim: Lost & Found Management System
# 📖 Project Purpose

Reclaim is a Lost & Found web application designed to help institutions such as colleges, offices, or community centers efficiently manage misplaced and recovered items.

**The system provides two key user experiences:**
- Public users can report lost items through an online form and browse verified found items.
- Administrators can securely log in to post, manage, and verify found items, as well as review claims submitted by users.
- The main goal of Reclaim is to streamline communication between item owners and administrators, reduce lost-item tracking inefficiencies, and create a transparent, digital solution for an otherwise manual process.

# ⚙️ Technologies Used
- Frontend: HTML5, CSS3
- Backend: PHP 7.x or newer
- Database: MySQL
- Database Access: PDO (prepared statements for safety)
- Image Uploads: Secure file handling with validation

## 🧱 Database Setup
Run the following SQL to create the database and tables:

```sql
CREATE TABLE Reclaim_admins (
    -- This table will be used to verify admin access. Record will be created when user registers for an admin account
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Reclaim_lost_items (
    -- This table will be used by admins to log items turned in, and will be used to display records of found items
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(120) NOT NULL,
    description TEXT NULL,
    category ENUM('electronics','clothing','jewelry','ids','bags','keys','other') NOT NULL,
    location_found VARCHAR(120) NOT NULL,
    date_found DATE NOT NULL,
    image_path VARCHAR(255) NULL,
    item_status ENUM('open','returned','archived') NOT NULL DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Reclaim_lost_reports (
    -- This table will store lost reports filled out by users
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(120) NOT NULL,
    category ENUM('electronics','clothing','jewelry','ids','bags','keys','other') NOT NULL,
    lost_date DATE NOT NULL,
    location_lost VARCHAR(120) NOT NULL,
    description TEXT NULL,
    proof_notes TEXT NULL,
    image_path VARCHAR(255) NULL,
    name VARCHAR(80) NOT NULL,
    email VARCHAR(120) NOT NULL,
    phone VARCHAR(40) NULL,
    status ENUM('open','matched','archived') NOT NULL DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

# 🧩 Main Features
- Lost Item Reports: Public users can submit detailed lost item forms.
- Found Items: Admins can post verified found items with photos.
- Secure Login: Admin portal using secure login
- Simple Dashboard: Admins can mark items as returned or archived.