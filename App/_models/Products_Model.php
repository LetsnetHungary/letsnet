<?php
    class Products_Model extends CoreApp\DataModel {
        public function __construct() {
            parent::__construct();
        }

        public function getFirstCategories() {
          $sitekey = CoreApp\Session::get("sitekey");
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/categoryapi/getCategory");
          curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS,
                      http_build_query(array('id' => "all")));

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $api_output = curl_exec ($ch);
          curl_close ($ch);
          return $api_output;
        }

        public function getProductsByCategory() {
          $category = "all";
          $position = 0;
          $sitekey = CoreApp\Session::get("sitekey");
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/productsapi/getProductsByCategory");
          curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS,
                      http_build_query(array('id' => $category, "position" => $position)));

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $api_output = curl_exec ($ch);
          curl_close ($ch);
          return $api_output;
        }

        public function getLabels() {
          $sitekey = CoreApp\Session::get("sitekey");
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/productsapi/getLabels");
          curl_setopt($ch, CURLOPT_POST, 1);

          /*
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                      http_build_query(array('id' => $category, "position" => $position)));
          */

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $api_output = curl_exec ($ch);
          curl_close ($ch);
          return $api_output;
        }
    }
