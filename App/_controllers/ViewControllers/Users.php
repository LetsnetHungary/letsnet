<?php

  class Users extends CoreApp\ViewController {

      public function __construct() {
        parent::__construct(__CLASS__);
        $this->a->userShouldChangeLocation("../AuthTest");
        $this->model = $this->loadModel(__CLASS__);

        $this->setUserModules(__CLASS__);        
      }     
  }
