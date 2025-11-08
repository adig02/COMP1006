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
                    <a class="btn hero-btn" href="#">Report a Lost Item</a>
                    <a class="btn hero-btn" href="#">Browse Found Items</a>
                </div>
            </section>
            <section class="how-it-works">
                <h2>How it Works</h2>
                <ol class="steps">
                    <li>
                        <h3>1. Report</h3>
                        <p>Lost something? Submit a report with what, where, and when.</p>
                        <a class="btn btn-tiny" href="report-lost.php">Report a Lost Item</a>
                    </li>
                    <li>
                        <h3>2. Review</h3>
                        <p>Our staff reviews reports and posts verified found items daily.</p>
                    </li>
                    <li>
                        <h3>3. Reclaim</h3>
                        <p>Think you see your item? Visit the listing and use the Claim page to provide proof.</p>
                        <a class="btn btn--tiny" href="claim.php">Submit a Claim</a>
                    </li>
                </ol>
            </section>
            <section class="recently-found">
                <h2>Recently Found Items</h2>
                <div class="recently-found-container">
                    <article class="card">
                        <img src="#" alt="#" />
                        <h3>Item Name</h3>
                        <p>Found: Library – Oct 28</p>
                        <p>Front pocket contains a notebook. Describe logo to claim.</p>
                        <a class="btn" href="#">Details</a>
                    </article>
                    <article class="card">
                        <img src="#" alt="#" />
                        <h3>Item Name</h3>
                        <p>Found: Library – Oct 28</p>
                        <p>Front pocket contains a notebook. Describe logo to claim.</p>
                        <a class="btn" href="#">Details</a>
                    </article>
                    <article class="card">
                        <img src="#" alt="#" />
                        <h3>Item Name</h3>
                        <p>Found: Library – Oct 28</p>
                        <p>Front pocket contains a notebook. Describe logo to claim.</p>
                        <a class="btn" href="#">Details</a>
                    </article>
                    <article class="card">
                        <img src="#" alt="#" />
                        <h3>Item Name</h3>
                        <p>Found: Library – Oct 28</p>
                        <p>Front pocket contains a notebook. Describe logo to claim.</p>
                        <a class="btn" href="#">Details</a>
                    </article>
                    <article class="card">
                        <img src="#" alt="#" />
                        <h3>Item Name</h3>
                        <p>Found: Library – Oct 28</p>
                        <p>Front pocket contains a notebook. Describe logo to claim.</p>
                        <a class="btn" href="#">Details</a>
                    </article>
                    <article class="card">
                        <img src="#" alt="#" />
                        <h3>Item Name</h3>
                        <p>Found: Library – Oct 28</p>
                        <p>Front pocket contains a notebook. Describe logo to claim.</p>
                        <a class="btn" href="#">Details</a>
                    </article>
                </div>
            </section>
            <section class="categories">
                <h2>Browse by category</h2>
                <div class="categories-container">
                    <a href="found_items.php?category=electronics">
                        <h3>Electronics</h3>
                        <img src="#" alt="cate"/>
                    </a>
                    <a href="found_items.php?category=bags">
                        <h3>Bags</h3>
                        <img src="#" alt="category for bags"/>
                    </a>
                    <a href="found_items.php?category=keys">
                        <h3>Keys</h3>
                        <img src="#" alt="category for keys"/>
                    </a>
                    <a href="found_items.php?category=ids">
                        <h3>IDs</h3>
                        <img src="#" alt="category for ids"/>
                    </a>
                    <a href="found_items.php?category=clothing_jewelry">
                        <h3>Clothing & Jewelry</h3>
                        <img src="#" alt="category for clothing and jewelry"/>
                    </a>
                    <a href="found_items.php?category=other">
                        <h3>Other</h3>
                        <img src="#" alt="category for other items"/>
                    </a>
                </div>
                <nav class="categories-nav">
                    <a href="found_items.php?category=electronics" class="categories-link">Electronics</a>
                    <a href="found_items.php?category=bags" class="pill">Bags</a>
                    <a href="found_items.php?category=keys" class="pill">Keys</a>
                    <a href="found_items.php?category=ids" class="pill">IDs</a>
                    <a href="found_items.php?category=clothing" class="pill">Clothing</a>
                    <a href="found_items.php?category=jewelry" class="pill">Jewelry</a>
                    <a href="found_items.php?category=other" class="pill">Other</a>
                </nav>
            </section>
            <?php
            require './templates/misplaced_cta.php'
            ?>
            <section class="trust">
                <h2>Verification & privacy</h2>
                <div class="trust-container">
                    <article>
                        <h3>Proof that protects you</h3>
                        <p>We never ask for passwords or unlock codes. Ownership is confirmed with non-sensitive details like serial numbers, distinct marks, or case color combinations.</p>
                    </article>
                    <article>
                        <h3>Admin-verified listings</h3>
                        <p>Only staff can post “Found” items to keep listings accurate and reduce spam.</p>
                    </article>
                    <article>
                        <h3>Private contact</h3>
                        <p>Your contact info from lost reports is used solely for matching and is not displayed publicly.</p>
                    </article>
                </div>
            </section>
            <?php
            require './templates/dropoff_cta.php'
            ?>
<?php
    // adding the footer
    require './templates/footer.php';
?>

