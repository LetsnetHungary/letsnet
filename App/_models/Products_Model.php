<?php
    class Products_Model extends CoreApp\DataModel {
        public function __construct() {
            parent::__construct();
        }

        public function getFirstCategories() {
          return $this->CURLWPOST("API", "/categoryapi/getCategory", array('id' => "all"));
        }

        public function getProductsByCategory() {
          return $this->CURLWPOST("API", "productsapi/getProductsByCategory", array('id' => 'all', 'position' => '0'));
        }

        public function getLabels() {
          return $this->CURLWPOST("API", "/productsapi/getLabels", array());
        }
    }
