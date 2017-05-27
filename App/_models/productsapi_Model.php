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

      print_r($api_output);

      $records = $product["images"];
      $c_r = count($records);

      for ($i=0; $i < $c_r; $i++) { 
        if($records[$i]["imagetype"] == "new") {
          $type = explode("/", $records[$i]["type"]);
          $src = "_cms/$sitekey/_img/Products/".$product["prodid"];
          createDir($src);
          $data = base64_decode($records[$i]["data"]);
          $src = "_cms/$sitekey/_img/Products/".$product["prodid"]."/$i.$type[1]";
          file_put_contents($src, $data);
        }
      }
    }

    private function uploadImage($prod_id, $i) {
      
    }

    
  }
