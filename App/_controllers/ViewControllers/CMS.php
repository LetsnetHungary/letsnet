<?php

  class CMS extends CoreApp\ViewController {
      public function __construct() {
          parent::__construct(__CLASS__);

          // User data / modules with USERHANDLER object (CoreApp Controller) necessary for every ViewController load
    			$userHandler = new CoreApp\Controller\UserHandler();

    			$userModules = $userHandler->Modules();
    			$userData = $userHandler->UserData();

    			$this->v->userData = $userData;
    			$this->v->userModules = $userModules;

          $this->v->page = $_GET["page"];
          $this->v->sitekey = CoreApp\Session::get("sitekey");
      }
  }
