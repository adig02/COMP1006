<?php
    /**
     * Giphy App Class
     * This controls the main logic of our app
     */
    class GiphyApp{
        private $api;
        public function __construct(GiphyApi $api){
            $this->api = $api;
        }
        /**
         * Display Top Trending Gifs
         */
        public function showTrendingGifs($page=1){
            $gifs = $this->api->getTrendingGifs($page);
            if (empty($gifs)) {
                echo "<p>No trending GIFs found.</p>";
                return;
            }
            // this section will contain all gif cards on the page
            echo '<section class="gifs-container">';
            foreach ($gifs as $gif) {
                // here it will grab the gif url with fallbacks
                $imgUrl = $gif['images']['downsized']['url']
                    ?? $gif['images']['downsized_medium']['url']
                    ?? $gif['images']['fixed_height']['url']
                    ?? $gif['images']['original']['url']
                    ?? null;
                if (!$imgUrl) {
                    continue;
                }
                // checking if the img url is null: if not null use its url, otherwise use the placeholder img
                $img = $imgUrl ? htmlspecialchars($imgUrl) : "https://via.placeholder.com/100x150.png?text=No+Image" ;
                // Grabbing the Gif Title
                $title = htmlspecialchars($gif['title'] ?? "Unknown title");
                // creating individual gif cards with the title and img
                echo "<div class='gif-card'>";
                    echo "<a href='{$imgUrl}'><img id='card-img' src='{$img}' alt='{$title}'></a>";
                    echo "<h3>{$title} </h3>";
                echo "</div>";
            }
            echo "</section>";


            // pagination links
            echo "<section class='pagination-container'>";
            $prevPage = max(1, $page - 1);
            $nextPage = $page + 1;
            // only display the previous page button if page > 1
            if ($page > 1){
                echo "<a class='buttons' href='?page={$prevPage}'>Previous Page</a>";
            }
            // next page button always displayed
            echo "<a class='buttons' href='?page={$nextPage}'>Next Page</a>";
            echo "</section>";

        }
    }
?>