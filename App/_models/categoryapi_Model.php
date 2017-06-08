<?php

  class categoryapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function getCategory($id) {
      return $this->CURLWPOST("API", "categoryapi/getCategory", array("id" => $id));
    }
    
  }
