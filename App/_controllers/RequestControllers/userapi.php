<?php

    class userapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);
          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");
        }

        public function getSitekey() {
          $array = array("sitekey" => CoreApp\Session::get("sitekey"));
          print_r(json_encode($array));
        }
    }
