<?php

  class Users extends CoreApp\ViewController {
      public function __construct() {

          parent::__construct(__CLASS__);

          $this->a->userShouldChangeLocation("../AuthTest");

          // User data / modules with USERHANDLER object (CoreApp Controller) necessary for every ViewController load
          $userHandler = new CoreApp\Controller\UserHandler();
          $userHandler->userAllowedToModule(__CLASS__, "Index");

          $this->model = $this->loadModel(__CLASS__);

    			$userModules = $userHandler->Modules();
    			$userData = $userHandler->UserData();
          $pageModules = $userHandler->getPageModules(__CLASS__);
          $this->PageModulesPHP("letsnet", $pageModules);

    			$this->v->userData = $userData;
    			$this->v->userModules = $userModules;
          $this->v->pageModules = $pageModules;

    			$userModules = null;
      }
  }
