<?php

    class sellsapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);
          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");
          $this->model = $this->loadModel(__CLASS__);
        }

        public function addStock() {
          $prod_id = $_POST["prod_id"];
          $c = $_POST["count"];

          $this->model->addStock($prod_id, $c);
        }

        public function addWebshopStock() {
          $prod_id = $_POST["prod_id"];
          $c = $_POST["count"];

          $this->model->addWebshopStock($prod_id, $c);
        }

        public function addFriendlySold() {
          $prod_id = $_POST["prod_id"];
          $c = $_POST["count"];

          $this->model->addFriendlySold($prod_id, $c);
        }
    }
