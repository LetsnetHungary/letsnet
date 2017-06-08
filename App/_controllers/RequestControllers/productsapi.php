<?php

  /**
  * Letsnet - RequestController - productsapi
  *
  * @author Letsnet <info@letsnet.hu>
  * @version 0.1
  * @category jsonapi
  * @uses productsapi_Model
  */

  class productsapi extends CoreApp\InnerController {

    /**
    * Main RequestController / Controller __construct
    * @var $this->a : Authentication object @category CoreApp Controller
    * Load the controller main model (__CLASS__)
    */

    public function __construct() {
      parent::__construct(__CLASS__);
      $this->a = $this->setAuthentication();
      $this->a->userShouldChangeLocation("../AuthTest");
      $this->model = $this->loadModel(__CLASS__);
    }

    /*  Public function for loading the products by category */

    public function getProductsByCategory() {
      $id = $_POST["id"];
      $position = $_POST["position"];
      print_r($this->model->getProductsByCategory($id, $position));
    }

    /*  Public function for load one product */

    public function getOneProduct() {
      $prodid = $_POST["id"];
      print_r($this->model->getOneProduct($prodid));
    }

    /*  Public function for upload / refresh product */

    public function uploadProduct() {
      $product = $_POST["product"];
      return $this->model->uploadProduct($product);
    }

    /*  Public function for refresh the products positions */

    public function position() {
      $products = $_POST["products"];
      $category = $_POST["category"];
      return $this->model->position($category, $products);
    }

    /*  Public function for delete one product */

    public function delete() {
      $prodid = $_POST["id"];
      return $this->model->delete($prodid);
    }
    
    /* end productapi CLASS */
  }
