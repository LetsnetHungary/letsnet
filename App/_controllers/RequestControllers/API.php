<?php

    class API extends CoreApp\InnerController {
        public function __construct() {
            parent::__construct(__CLASS__);

            $a = $this->setAuthentication();
            $a->userShouldChangeLocation("../AuthTest");

            $this->model = $this->loadModel(__CLASS__);
        }

        public function orderAPI($function) {
          $functionname = "orderAPI".$function;
          $p = isset($_POST) ? $_POST : 0;
          print_r($this->model->$functionname($p));
        }

        public function commissionAPI($function) {
          $functionname = "commissionAPI".$function;
          $p = isset($_POST) ? $_POST : 0;
          print_r($this->model->$functionname($p));
        }

        public function sellsAPI($function) {
          $functionname = "sellsAPI".$function;
          $p = isset($_POST) ? $_POST : 0;
          print_r($this->model->$functionname($p));
        }

        public function CMSAPI($function) {
          $functionname = "CMSAPI".$function;
          $sections = $_POST;
          $this->model->$functionname($sections);
        }

        public function usersAPI($function) {
          $functionname = "usersAPI".$function;
          $data = $_POST["data"];
          $this->model->$functionname($data);
        }

        public function logout() {
            $this->model->logout();
        }

        public function sendDevicekey() {
          $email = $_POST["email"];
          $devicekey = $_POST["devicekey"];
          $mail = new CoreApp\Mail($email, "info@letsnet.hu", "Készülékkulcs", "Az Ön készülékkulcsa a következő : $devicekey", "");
  				$mail->from = "info@letsnet.hu";
  				$mail->to = $email;
  				$mail->send();
        }
    }
