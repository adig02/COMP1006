<?php
    // setting the custom metadata
    $pageTitle = "Reclaim | Home";
    $pageDesc = "A smarter way to manage lost and found.";

    // include required files

    // adding the header
    require './templates/header.php';
?>
            <section class="home-hero">
                <h1>Reclaim</h1>
                <p>A smarter way to manage lost and found.</p>
                <div class="hero-buttons-container">
                    <a class="btn hero-btn" href="report_lost.php">Report a Lost Item</a>
                    <a class="btn hero-btn" href="found_items.php">Browse Found Items</a>
                </div>
            </section>
            <section class="how-it-works">
                <div>
                    <h2>How it Works</h2>
                    <p>Three simple steps to reunite with your belongings</p>
                </div>
                <ol class="steps">
                    <li>
                        <img src="./img/Report%20Icon.png" alt="Report icon">
                        <h3>Report</h3>
                        <p>Lost something? Submit a report with what, where, and when.</p>
                        <a class="btn btn-tiny" href="report-lost.php">Report Now</a>
                    </li>
                    <li>
                        <img src="./img/Search%20Icon%2050.png" alt="Review icon">
                        <h3>Review</h3>
                        <p>Our staff reviews reports and posts verified found items daily.</p>
                        <a class="btn btn--tiny" href="claim.php">Browse Items</a>
                    </li>
                    <li>
                        <img src="./img/Checkmark%20Icon%2050.png" alt="Reclaim icon">
                        <h3>Reclaim</h3>
                        <p>Think you see your item? Visit the listing and use the Claim page to provide proof.</p>
                        <a class="btn btn--tiny" href="claim.php">Reclaim</a>
                    </li>
                </ol>
            </section>
            <section class="recently-found">
                <div class="recently-found-header">
                    <h2>Recently Found Items</h2>
                    <p>Browse the latest items waiting to be reunited with their owners</p>
                </div>
                <div class="recently-found-container">
                    <article class="card">
                        <img src="./img/backpack.jpg" alt="backpack"/>
                        <div>
                            <h3>Item Name</h3>
                            <p>Found: Library – Oct 28</p>
                            <p>Front pocket contains a notebook. Describe logo to claim.</p>
                            <a class="btn" href="#">View Details</a>
                        </div>
                    </article>
                    <article class="card">
                        <img src="./img/car_keys.jpg" alt="car keys" />
                        <div>
                            <h3>Item Name</h3>
                            <p>Found: Library – Oct 28</p>
                            <p>Front pocket contains a notebook. Describe logo to claim.</p>
                            <a class="btn" href="#">View Details</a>
                        </div>
                    </article>
                    <article class="card">
                        <img src="./img/backpack.jpg" alt="backpack" />
                        <div>
                            <h3>Item Name</h3>
                            <p>Found: Library – Oct 28</p>
                            <p>Front pocket contains a notebook. Describe logo to claim.</p>
                            <a class="btn" href="#">View Details</a>
                        </div>
                    </article>
                    <article class="card">
                        <img src="./img/car_keys.jpg" alt="car keys" />
                        <div>
                            <h3>Item Name</h3>
                            <p>Found: Library – Oct 28</p>
                            <p>Front pocket contains a notebook. Describe logo to claim.</p>
                            <a class="btn" href="#">View Details</a>
                        </div>
                    </article>
                    <article class="card">
                        <img src="./img/backpack.jpg" alt="backpack" />
                        <div>
                            <h3>Item Name</h3>
                            <p>Found: Library – Oct 28</p>
                            <p>Front pocket contains a notebook. Describe logo to claim.</p>
                            <a class="btn" href="#">View Details</a>
                        </div>
                    </article>
                    <article class="card">
                        <img src="./img/car_keys.jpg" alt="car keys" />
                        <div>
                            <h3>Item Name</h3>
                            <p>Found: Library – Oct 28</p>
                            <p>Front pocket contains a notebook. Describe logo to claim.</p>
                            <a class="btn" href="#">View Details</a>
                        </div>
                    </article>
                </div>
            </section>
            <section class="categories">
                <h2>Browse by category</h2>
                <div class="categories-container">
                    <a class="categories-item" href="found_items.php?category=electronics">
                        <h3>Electronics</h3>
                        <img src="./img/icons8-electronics-96.png" alt="category for electronics"/>
                    </a>
                    <a class="categories-item" href="found_items.php?category=bags">
                        <h3>Bags</h3>
                        <img src="./img/icons8-backpack-96.png" alt="category for bags"/>
                    </a>
                    <a class="categories-item" href="found_items.php?category=keys">
                        <h3>Keys</h3>
                        <img src="./img/icons8-keys-96.png" alt="category for keys"/>
                    </a>
                    <a class="categories-item" href="found_items.php?category=ids">
                        <h3>IDs</h3>
                        <img src="./img/icons8-id-96.png" alt="category for ids"/>
                    </a>
                    <a class="categories-item" href="found_items.php?category=clothing">
                        <h3>Clothing</h3>
                        <img src="./img/icons8-jacket-96.png" alt="category for clothing"/>
                    </a>
                    <a class="categories-item" href="found_items.php?category=jewelry">
                        <h3>Jewelry</h3>
                        <img src="./img/icons8-jewelry-96.png" alt="category for jewelry"/>
                    </a>
                    <a class="categories-item" href="found_items.php?category=other">
                        <h3>Other</h3>
                        <img src="./img/icons8-other-96.png" alt="category for other items"/>
                    </a>
                </div>
            </section>
            <?php
            require './templates/misplaced_cta.php';
    // adding the footer
    require './templates/footer.php';
?>

