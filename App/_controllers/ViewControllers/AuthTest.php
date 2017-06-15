<?php

  class AuthTest extends CoreApp\ViewController {

      public function __construct() {
          parent::__construct(__CLASS__);
          $this->setUserModules(__CLASS__);
          $this->a->loggedInChangeLocation("../Index");
      }

  }
