<?php
    class Orders_Model extends CoreApp\DataModel {

      public function __construct() {
          parent::__construct();

      }

      public function getOrders() {
        $sitekey = CoreApp\Session::get("sitekey");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/ordersapi/getOrders");
        curl_setopt($ch, CURLOPT_POST, 1);

        /*
          curl_setopt($ch, CURLOPT_POSTFIELDS,
                    http_build_query(array('logged_user' => $this->logged_user, "devicekey" => "0")));
         */

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $api_output = curl_exec ($ch);
        curl_close ($ch);

        $orders = json_decode($api_output, true);

        return $orders;
      }
  }
