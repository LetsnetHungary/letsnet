<?php
    class Sells_Model extends CoreApp\DataModel {

      public function __construct() {
          parent::__construct();
      }

      public function getSells() {
        return json_decode($this->CURLWPOST("API", "sellsapi/getSells", array()), TRUE);
      }
      
    }
