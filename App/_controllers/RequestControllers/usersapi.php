<?php

    class usersapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);



          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");

          $function = explode("/", $_SERVER["REQUEST_URI"]);
          $function = $function[2];

          $userHandler = new CoreApp\Controller\UserHandler();
          //$userHandler->userAllowedToAPIFunction(__CLASS__, $function, "Index");

          $this->model = $this->loadModel(__CLASS__);
        }

        public function newuser() {
          $data = $_POST["data"];

          $this->model->newuser($data);
          return;
        }

        public function newDevicekey() {
          $data = $_POST["data"];
          $this->model->newDevicekey($data);
        }

        public function usermodulesconfig() {
          $data = $_POST["data"];
          print_r($data);
        }

        public function newDatabase() {
          $data = $_POST["data"];
          return $this->model->newDatabase($data["key"], $data["value"]);
        }

        public function newSite() {
          $data = $_POST["data"];
          return $this->model->newSite($data["key"], $data["value"]);
        }
    }
