<?php

  class productsapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function getProductsByCategory($p) {
      $sitekey = CoreApp\Session::get("sitekey");
      $id = $p["id"];
      $position = $p["position"];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/productsapi/getProductsByCategory");
      curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS,
                  http_build_query(array('id' => $id, "position" => $position)));

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $api_output = curl_exec ($ch);
      curl_close ($ch);
      return $api_output;
    }

    public function getOneProduct($p) {
      $sitekey = CoreApp\Session::get("sitekey");
      $prod_id = $p["id"];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/productsapi/getOneProduct");
      curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS,
                  http_build_query(array('prod_id' => $prod_id)));

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $api_output = curl_exec ($ch);
      curl_close ($ch);

      return $api_output;
    }

    public function uploadProduct($p) {
      $sitekey = CoreApp\Session::get("sitekey");
      $product = $p["product"];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://a.$sitekey".CoreApp\ServerHandler::curlEnding()."/productsapi/uploadProduct");
      curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS,
                  http_build_query(array('product' => $product)));

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $api_output = curl_exec ($ch);
      curl_close ($ch);
      echo $api_output;
      $api_output = json_decode($api_output);

      $product["prodid"] = $api_output->prod_id;

      $records = isset($product["images"]) ? $product["images"] : array();
      $c_r = count($records);
      if($c_r > 0) {
        if($records[0]["imagetype"] == "new") {
        $type = explode("/", $records[0]["type"]);
        $src = "_cms/$sitekey/_img/Products/".$product["prodid"];
        
        createDir($src);
        $data = base64_decode($records[0]["data"]);
        $src = "_cms/$sitekey/_img/Products/".$product["prodid"]."/1.$type[1]";
        echo $src;
        file_put_contents($src, $data);
      }
      }
      
    }
  }
