<?php

    class productsapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);
          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");
          $this->model = $this->loadModel(__CLASS__);
        }

        public function getProductsByCategory() {
          $p = $_POST;
          $p["id"] = "all";
          echo $this->model->getProductsByCategory($p);
        }

        public function getOneProduct() {
          $p = $_POST;
          echo $this->model->getOneProduct($p);
        }

        public function uploadProduct() {
          $p = $_POST;
          echo $this->model->uploadProduct($p);
        }
    }
