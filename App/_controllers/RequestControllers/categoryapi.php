<?php

    class categoryapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);
          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");
          $this->model = $this->loadModel(__CLASS__);
        }

        public function getCategory() {
          $id = $_POST["id"];
          print_r($this->model->getCategory($id));
        }
    }
