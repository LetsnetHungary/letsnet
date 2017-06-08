<?php
    class Commission_Model extends CoreApp\DataModel {

        public function __construct() {
            parent::__construct();
         }

        public function getCommission() {
          return json_decode($this->CURLWPOST("API", "commissionapi/getCommissions", array()));
        }

        public function getProducts() {
          return json_decode($this->CURLWPOST("API", "commissionapi/getProducts", array()), TRUE);
        }

        public function getShops() {
          return json_decode($this->CURLWPOST("API", "commissionapi/getShops", array()), TRUE);
        }

        public function getPrices() {
          return json_decode($this->CURLWPOST("API", "commissionapi/getPrices", array()), TRUE);
        }

    }
