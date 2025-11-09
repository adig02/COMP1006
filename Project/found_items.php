<?php
// setting the custom metadata
$pageTitle = "Reclaim | Found Items";
$pageDesc = "Browse verified found items currently held by the Lost & Found office.";

// include required files

// adding the header
require './templates/header.php';

?>
            <section class="hero-template found-items">
                <div>
                    <h2>Found Items</h2>
                    <i class="fa-solid fa-magnifying-glass fa-2x"></i>
                </div>
                <p>Browse verified found items currently held by the Lost & Found office.</p>
            </section>
            <section class="tips-report"></section>
            <section class="search-found">
                <form method="post" enctype="multipart/form-data">
                    <div>
                        <input type="search" placeholder="Search item name or description">
                        <select>
                            <option>Last 30 days</option>
                            <option>Last 14 Days</option>
                            <option>Last Week</option>
                        </select>
                        <select>
                            <option>All Categories</option>
                            <option>Electronics</option>
                            <option>Keys</option>
                            <option>Ids</option>
                            <option>Clothing</option>
                            <option>Jewelry</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <input type="submit" value="Search">
                </form>
            </section>
            <section class="found-items-container">
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
// adding the cta
require './templates/misplaced_cta.php';
// adding the footer
require './templates/footer.php';
?>