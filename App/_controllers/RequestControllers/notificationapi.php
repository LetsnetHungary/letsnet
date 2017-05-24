<?php

    class notificationapi extends CoreApp\InnerController {
        public function __construct() {
          parent::__construct(__CLASS__);
          $this->a = $this->setAuthentication();
          $this->a->userShouldChangeLocation("../AuthTest");
          $this->model = $this->loadModel(__CLASS__);
        }

        public function a() {
          //ez az amit kívülről eléregister_tick_function
          $this->model->functionname();
        }
    }
