<?php

    class ordersapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);
          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");
          $this->model = $this->loadModel(__CLASS__);
        }

        public function viewOrder() {
          $id = $_POST["id"];
          print_r($this->model->viewOrder($id));
        }

        public function setState() {
          $id = $_POST["id"];
          $state = $_POST["state"];
          print_r($this->model->setState($id, $state));
        }

        public function notVisible() {
          $id = $_POST["id"];
          print_r($this->model->notVisible($id));
        }
    }
