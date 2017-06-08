<?php
    class Orders_Model extends CoreApp\DataModel {

      public function __construct() {
          parent::__construct();
      }

      public function getOrders() {
        return json_decode($this->CURLWPOST("API", "ordersapi/getOrders", array()), TRUE);
      }
  }
