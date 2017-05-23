<?php

  class categoryapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function getCategory($p) {
      $id = $p["id"];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/commissionapi/addCommission");
      curl_setopt($ch, CURLOPT_POST, 1);

      curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query(array("id" => $id)));

      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $api_output = curl_exec ($ch);
      curl_close($ch);
      print_r($api_output);
    }
  }
