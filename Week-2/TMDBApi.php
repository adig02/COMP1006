<?php
    /**
     * TMDB Api class with cURL
     * this handles the communication with the API
     */

    class TMDBApi{
        private $baseUrl;
        private $apiKey;
        public function __construct($baseUrl, $apiKey){
            $this->baseUrl = $baseUrl;
            $this->apiKey = $apiKey;
        }
        /**
         * Make our request to TMDB API using cURL
         */
        private function request($endpoint){
            $url = $this->baseUrl . $endpoint . "&api_key=" . $this->apiKey;
            // initialize cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            $response = curl_exec($ch);
            if(curl_errno($ch)){
                http_response_code(404);
                throw  new Exception("cURL Error: " . curl_error($ch));
            }
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if($statusCode == 404){
                throw  new Exception("Movie not found");
            }
            $data = json_decode($response, true);

            // Handle TMDB error response
            if(isset($data['status_message'])){
                throw new Exception("TMDB Error: " . $data['status_message']);
            }
            return $data;
        }
        /**
         * fetch our popular movies
         */
        public function getPopularMovies($page = 1){
            try {
                $data = $this->request("/movie/popular?language=en-US&page=" . intval($page));
                return $data['results'] ?? [];
            } catch (Exception $e){
                echo "<p>API Error: " . $e->getMessage() . "</p>";
                return [];
            }
        }
    }
?>