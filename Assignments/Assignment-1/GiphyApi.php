<?php
/**
 * GIPHY Api Class with cURL
 * this handles the communication with the API
 */

    class GiphyApi{
        private $baseUrl;
        private $apiKey;
        public function __construct($apiKey, $baseUrl){
            $this->apiKey = $apiKey;
            $this->baseUrl = $baseUrl;
        }
        /**
         * Make our request to the GIPHY API using cURL
         */
        private function request($endpoint){
            $url = $this->baseUrl . $endpoint . "&apiKey=" . $this->apiKey;
            // initialize cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            $response = curl_exec($ch);
            if(curl_errno($ch)){
                http_response_code(404);
                throw new Exception("cURL Error: " . curl_error($ch));
            }
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if($statusCode == 404){
                throw new Exception("Gif not found");
            }
            $data = json_decode($response, true);

            // Handle GIPHY error response
            if (!isset($data['meta']) || !isset($data['meta']['status'])) {
                throw new Exception("GIPHY Error: Missing 'meta' in response");
            }
            return $data;
        }
        /**
         * Fetch Top Trending Gifs
         */
        public function getTrendingGifs($page = 1){
            $page = max(1, (int)$page);
            // Each page will be offset by 12 gifs so that new gifs are displayed on each page.
            $offset = ($page - 1) * 12;
            try{
                // limit set to 12 per page
                $data = $this->request("/trending?limit=12&offset={$offset}&rating=g&bundle=messaging_non_clips");
                return $data['data'] ?? [];
            } catch (Exception $e){
                echo "<p>API Error: " . $e->getMessage() . "</p>";
                return [];
            }
        }
    }
?>
