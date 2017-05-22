<?php

  class ordersapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function viewOrder($p) {
      $sitekey = CoreApp\Session::get("sitekey");
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/ordersapi/viewOrder");
      curl_setopt($ch, CURLOPT_POST, 1);

      curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query(array("id" => $p["id"])));

      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $order = curl_exec ($ch);

      curl_close($ch);
      return $order;
    }

    public function setState($p) {
      $sitekey = CoreApp\Session::get("sitekey");
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/ordersapi/setState");
      curl_setopt($ch, CURLOPT_POST, 1);

      curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query(array("id" => $p["id"], "state" => $p["state"])));

      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $order = curl_exec ($ch);

      curl_close($ch);
      return $order;
    }

    public function notVisible($p) {
      $sitekey = CoreApp\Session::get("sitekey");
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/ordersapi/notVisible");
      curl_setopt($ch, CURLOPT_POST, 1);

      curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query(array("id" => $p["id"])));

      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $order = curl_exec ($ch);

      curl_close($ch);
      return $order;
    }

  }
