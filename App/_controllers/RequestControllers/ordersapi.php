<?php

    class ordersapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);
          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");
          $this->model = $this->loadModel(__CLASS__);
        }

        public function viewOrder() {
          $p = $_POST;
          print_r($this->model->viewOrder($p));
        }

        public function setState() {
          $p = $_POST;
          return($this->model->setState($p));
        }

        public function notVisible() {
          $p = $_POST;
          return($this->model->notVisible($p));
        }
    }
