<?php

  /**
  * Letsnet - DataModel - productsapi_Model
  *
  * @author Letsnet <info@letsnet.hu>
  * @version 0.1
  * @category cURL / DataModel
  */

  class productsapi_Model extends CoreApp\DataModel {

    /* Main DataModel / Model __construct (__CLASS__) */

    public function __construct() {
      parent::__construct();
    }

    /**
    * Controller's function pair (public)' 
    * @uses DataModel cURL (1)
    * @category POST
    * @param string $prodid contains the product's ID
    * @param int $position for the last product
    */

    public function getProductsByCategory($prodid, $position) {
      // DataModel cURL (1)
      return $this->CURLWPOST("API", "productsapi/getProductsByCategory", array('id' => $prodid, 'position' => $position));
    }

    /**
    * Controller's function pair (public)' 
    * @uses DataModel cURL (1) 
    * @category POST
    * @param string $prodid contains the product's ID
    */

    public function getOneProduct($prodid) {
      // DataModel cURL (1)
      return $this->CURLWPOST("API", "productsapi/getOneProduct", array('prodid' => $prodid));
    }

    /**
    * Controller's function pair (public)' 
    * @uses DataModel cURL (1) for upload / refresh the product info
    * @uses DataModel cURL (2) for upload / refresh the product image
    * @category POST
    * @param array() $product contains the info of the new product
    */

    public function uploadProduct($product) {

      // DataModel cURL (1)
      $api_output = $this->CURLWPOST("API", "productsapi/uploadProduct", array('product' => $product));
      $api_output = json_decode($api_output); 

      $product["prodid"] = $api_output->prod_id;
      $records = isset($product["images"]) ? $product["images"] : array();

      // DataModel cURL (2)
      $api_output = $this->CURLWPOST("SITE", "productsapi/uploadImage", array('prodid' => $product["prodid"], 'records' => $records));

      echo $api_output;

      $sitekey = CoreApp\Session::get("sitekey");
      
      $c_r = count($records);
      if($c_r > 0) {
        if($records[0]["imagetype"] == "new") {
          $type = explode("/", $records[0]["type"]);
          $src = "_cms/$sitekey/_img/Products/".$product["prodid"]; createDir($src);
          $data = base64_decode($records[0]["data"]);
          $src = "_cms/$sitekey/_img/Products/".$product["prodid"]."/1.$type[1]";
          file_put_contents($src, $data);
        }
      } 
    }

    /**
    * Controller's function pair (public)' 
    * @uses DataModel cURL (1) for refresh the products positions
    * @category POST
    * @param string $category contains the products category
    * @param array() $products contains the products and the new positions
    */

    public function position($category, $products) {
      // DataModel cURL (1)
      print_r($this->CURLWPOST("API", "/productsapi/position", array('category' => $category, 'products' => $products)));
    }

    /**
    * Controller's function pair (public)' 
    * @uses DataModel cURL (1) product delete function
    * @category POST
    * @param string $prodid contains the product's ID
    */

    public function delete($prodid) {
      return $this->CURLWPOST("API", "/productsapi/deleteProduct", array('prodid' => $prodid));
    }

    /* end productapi_Model CLASS */
  }
