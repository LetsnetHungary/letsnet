<?php

  class sellsapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function addStock($prod_id, $count) {
      return $this->CURLWPOST("API", "sellsapi/addStock", array("prod_id" => $prod_id, "count" => $count));
    }

    public function addWebshopStock($prod_id, $count) {
      return $this->CURLWPOST("API", "sellsapi/addWebshopStock", array("prod_id" => $prod_id, "count" => $count));
    }

    public function addFriendlySold($prod_id, $count) {
      return $this->CURLWPOST("API", "sellsapi/addFriendlySold", array("prod_id" => $prod_id, "count" => $count));
    }
    
  }
