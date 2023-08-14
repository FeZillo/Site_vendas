<?php

    namespace App\Pix;

    class Api {
        private $baseURL;
        private $clientID;
        private $clientSecret;
        private $certificate;
        
        public function __construct($baseURL, $clientID, $clientSecret, $certificate) {
            $this->baseURL = $baseURL;
            $this->clientID = $clientID;
            $this->clientSecret = $clientSecret;
            $this->certificate = $certificate;
        }
    }

?>