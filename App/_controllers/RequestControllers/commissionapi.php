<?php

    class commissionapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);
          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");
          $this->model = $this->loadModel(__CLASS__);
        }

        public function addCommission() {
          $p = $_POST;
          print_r($this->model->addCommission($p));
        }

        public function deleteCommission() {
          $id = $_POST["id"];
          print_r($this->model->deleteCommission($id));
        }

        public function refreshCount() {
          $id = $_POST["id"];
          $count = $_POST["count"];
          print_r($this->model->refreshCount($id, $count));
        }
    }
