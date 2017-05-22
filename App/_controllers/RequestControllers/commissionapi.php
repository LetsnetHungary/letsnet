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
          $this->model->addCommission($p);
        }

        public function deleteCommission() {
          $p = $_POST;

          print_r($p);
          $this->model->deleteCommission($p);
        }

        public function refreshCount() {
          $p = $_POST;
          $this->model->refreshCount($p);
        }
    }
