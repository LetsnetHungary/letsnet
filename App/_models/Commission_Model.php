<?php
    class Commission_Model extends CoreApp\DataModel {
        public function __construct() {
            parent::__construct();
         }

        public function getCommission() {
          $sitekey = CoreApp\Session::get("sitekey");
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/commissionapi/getCommissions");
          curl_setopt($ch, CURLOPT_POST, 1);
          /*

          // in real life you should use something like:
           curl_setopt($ch, CURLOPT_POSTFIELDS,
                    http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey)));
          */

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $api_output = curl_exec ($ch);

          $commissions = json_decode($api_output);
          curl_close($ch);
          return $commissions;
        }

        public function getProducts() {
          $sitekey = CoreApp\Session::get("sitekey");
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/commissionapi/getProducts");
          curl_setopt($ch, CURLOPT_POST, 1);
          /*

          // in real life you should use something like:
           curl_setopt($ch, CURLOPT_POSTFIELDS,
                    http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey)));
          */

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $api_output = curl_exec ($ch);

          $prods = json_decode($api_output, true);
          curl_close($ch);
          return $prods;
        }

        public function getShops() {
          $sitekey = CoreApp\Session::get("sitekey");
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/commissionapi/getShops");
          curl_setopt($ch, CURLOPT_POST, 1);
          /*

          // in real life you should use something like:
           curl_setopt($ch, CURLOPT_POSTFIELDS,
                    http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey)));
          */

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $api_output = curl_exec ($ch);

          $shops = json_decode($api_output, true);
          curl_close($ch);
          return $shops;
        }

        public function getPrices() {
          $sitekey = CoreApp\Session::get("sitekey");
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/commissionapi/getPrices");
          curl_setopt($ch, CURLOPT_POST, 1);
          /*

          // in real life you should use something like:
           curl_setopt($ch, CURLOPT_POSTFIELDS,
                    http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey)));
          */

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $api_output = curl_exec ($ch);

          $prices = json_decode($api_output, true);
          curl_close($ch);
          return $prices;
        }
    }
