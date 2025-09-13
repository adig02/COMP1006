<?php
/**
* Entry point of the app
*/
require_once "config.php";
require_once "GiphyApi.php";
require_once "GiphyApp.php";

// create dAPI Handler
$api = new GiphyApi(GIPHY_API_KEY, GIPHY_BASE_URL);

//create our Giphy app object
$app = new GiphyApp($api);

// get the current page from the url
$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--In the head, I include the required metadata, the custom fonts & the stylesheet-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex, nofollow">
        <meta name="description" content="GIF Explorer | Trending Gifs ">
        <title>GIF Explorer</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <!--Area visible to the end user -->
    <header>
        <!--logo container-->
        <div>
            <a id="logo-container" href="index.php">
                <h1>GIF Explorer</h1>
                <img id="logo" src="./img/Giphy%20Logo.svg" alt="Giphy Logo">
            </a>
        </div>
        <!--Menu Bar-->
        <nav>
            <menu class="menu">
                <li><a href="index.php">Trending</a></li>
                <li><a href="https://giphy.com/?type=stickers">Stickers</a></li>
                <li><a href="https://giphy.com/?type=clips">Clips</a></li>
                <li><a href="https://giphy.com/">GIPHY</a></li>
            </menu>
        </nav>
    </header>
    <body>
        <section class="pageContainer">
            <h2>Trending Gifs </h2>
            <section>
                <?php
                $app->showTrendingGifs($currentPage);
                ?>
            </section>
        </section>
    </body>
    <footer>
        <p>COMP1006 - Assignment 1 by Adi G </p>
        <a href="https://developers.giphy.com/"> GIPHY API </a>
        <p> This app uses the GIPHY API but is not endorsed or certified by GIPHY.</p>
    </footer>


