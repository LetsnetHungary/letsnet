<?php

  class sellsapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function addStock($prod_id, $count) {
      $sitekey = CoreApp\Session::get("sitekey");

      $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/sellsapi/addStock");
         curl_setopt($ch, CURLOPT_POST, 1);

         curl_setopt($ch, CURLOPT_POSTFIELDS,
           http_build_query(array("prod_id" => $prod_id, "count" => $count)));

         // receive server response ...
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         $api_output = curl_exec ($ch);
         echo $api_output;

         curl_close($ch);
         return ($api_output);
    }

    public function addWebshopStock($prod_id, $count) {
      $sitekey = CoreApp\Session::get("sitekey");

      $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/sellsapi/addWebshopStock");
         curl_setopt($ch, CURLOPT_POST, 1);

         curl_setopt($ch, CURLOPT_POSTFIELDS,
           http_build_query(array("prod_id" => $prod_id, "count" => $count)));

         // receive server response ...
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         $api_output = curl_exec ($ch);
         echo $api_output;

         curl_close($ch);
         return ($api_output);
    }

    public function addFriendlySold($prod_id, $count) {
      $sitekey = CoreApp\Session::get("sitekey");

      $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/sellsapi/addFriendlySold");
         curl_setopt($ch, CURLOPT_POST, 1);

         curl_setopt($ch, CURLOPT_POSTFIELDS,
           http_build_query(array("prod_id" => $prod_id, "count" => $count)));

         // receive server response ...
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         $api_output = curl_exec ($ch);
         echo $api_output;

         curl_close($ch);
         return ($api_output);
    }
  }
