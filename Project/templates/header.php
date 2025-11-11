<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo "$pageTitle"; ?></title>
        <meta name="description" content="<?php echo "$pageDesc"; ?>">
        <meta name="robots" content="noindex,nofollow">
        <!--  Custom Fonts  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <!--icons-->
        <script src="https://kit.fontawesome.com/606034532a.js" crossorigin="anonymous"></script>
        <!--  Add CSS  -->
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <header>
            <div class="desktop-header">
                <!-- logo container -->
                <a class="dsk-logo-container" href="../index.php" >
                    <img class="desktop-logo" src="./img/reclaim_logo_with_text.png" alt="reclaim logo icon">
                </a>
                <!-- main menu bar -->
                <nav>
                    <menu>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./found_items.php">Browse Found Items</a></li>
                        <li><a href="./report_lost.php">Report Lost Item</a></li>
                        <li><a href="./about.php">About</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                    </menu>
                </nav>
                <!-- admin Login button-->
                <a href="./login.php" class="login-btn btn">Admin Login</a>
            </div>
            <div class="mobile-menu">
                <!-- mobile hamburger icon -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                     viewBox="0 0 50 50">
                    <path d="M 3 9 A 1.0001 1.0001 0 1 0 3 11 L 47 11 A 1.0001 1.0001 0 1 0 47 9 L 3 9 z M 3 24 A 1.0001 1.0001 0 1 0 3 26 L 47 26 A 1.0001 1.0001 0 1 0 47 24 L 3 24 z M 3 39 A 1.0001 1.0001 0 1 0 3 41 L 47 41 A 1.0001 1.0001 0 1 0 47 39 L 3 39 z"></path>
                </svg>
            </div>
        </header>
        <main>
