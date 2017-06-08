<?php

  class ordersapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function viewOrder($id) {
      return $this->CURLWPOST("API", "ordersapi/viewOrder", array("id" => $id));
    }

    public function setState($id, $state) {
      return $this->CURLWPOST("API", "ordersapi/setState", array("id" => $id, "state" => $state));
    }

    public function notVisible($id) {
      return $this->CURLWPOST("API", "ordersapi/notVisible", array("id" => $id));
    }

  }
