<?php

  class commissionapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function addCommission($p) {
      $sitekey = CoreApp\Session::get("sitekey");
      $data = array();
      $data["product"] = $p["product"];
      $data["name"] = $p["name"];
      $data["price"] = $p["price"];
      $data["count"] = $p["count"];
      $data["deadline"] = $p["deadline"];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/commissionapi/addCommission");
      curl_setopt($ch, CURLOPT_POST, 1);

      curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query(array("data" => $data)));

      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $api_output = curl_exec ($ch);
      curl_close($ch);
      return ($api_output);
    }

    public function deleteCommission($p) {
      $sitekey = CoreApp\Session::get("sitekey");

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/commissionapi/deleteCommission");
      curl_setopt($ch, CURLOPT_POST, 1);

      curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query(array("id" => $p["id"])));

      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $api_output = curl_exec ($ch);
      curl_close($ch);
      return ($api_output);
    }

    public function refreshCount($p) {
      $sitekey = CoreApp\Session::get("sitekey");

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/commissionapi/refreshCount");
      curl_setopt($ch, CURLOPT_POST, 1);

      curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query(array("id" => $p["id"], "count" => $p["count"])));

      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $api_output = curl_exec ($ch);
      curl_close($ch);
      return ($api_output);
    }
  }
