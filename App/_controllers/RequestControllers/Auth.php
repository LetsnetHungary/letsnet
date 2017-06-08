<?php

    class Auth extends CoreApp\InnerController {

      public function __construct() {
          parent::__construct(__CLASS__);
          $this->model = $this->loadModel(__CLASS__);
          $this->a = $this->setAuthentication();
      }

      public function getLocation() {
        if(!empty($_POST["lattitude"]) && !empty($_POST["longitude"])) {
            $la = $_POST["lattitude"];
            $lo = $_POST["longitude"];
            $this->model->getLocation($la, $lo);
        }
        else {
            echo "We are not able to get your position.";
        }
      }

      public function login() {
          if(isset($_POST["l"])) {
              if(isset($_POST["d"]) && !empty($_POST["d"])) {
                $logindata = $_POST["d"];
                $a = $this->model->newAttemptUser($logindata);
                $this->a->loginAttemptUser($a);
                return;
              }
              else {
                  //there is no post request near here
                  echo "There is no request near here (2)";
              }
          }
          else {
              echo "There is no request near here (1)";
          }
      }
    }
