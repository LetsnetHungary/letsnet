<?php

  class commissionapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function addCommission($p) {

      $data = array();
      $data["product"] = $p["product"];
      $data["name"] = $p["name"];
      $data["price"] = $p["price"];
      $data["count"] = $p["count"];
      $data["deadline"] = $p["deadline"];

      return $this->CURLWPOST("API", "commissionapi/addCommission", array("data" => $data));
    }

    public function deleteCommission($id) {
      return $this->CURLWPOST("API", "commissionapi/deleteCommission", array("id" => $id));
    }

    public function refreshCount($id, $count) {
      return $this->CURLWPOST("API", "commissionapi/refreshCount", array("id" => $id, "count" => $count));
    }

  }
