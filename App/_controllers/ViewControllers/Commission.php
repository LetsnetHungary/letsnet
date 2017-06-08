<?php
	class Commission extends CoreApp\ViewController {
		public function __construct() {
			parent::__construct(__CLASS__);

			$this->a->userShouldChangeLocation("../AuthTest");
      $this->model = $this->loadModel(__CLASS__);

			// User data / modules with USERHANDLER object (CoreApp Controller) necessary for every ViewController load
			$userHandler = new CoreApp\Controller\UserHandler();

			$userModules = $userHandler->Modules();
			$userData = $userHandler->UserData();
			$pageModules = $userHandler->getPageModules(__CLASS__);
      $this->PageModulesPHP("letsnet", $pageModules);

			$this->v->userData = $userData;
			$this->v->userModules = $userModules;
			$this->v->pageModules = $pageModules;
		}

		/*
		public function modelDidLoad() {
			echo "<br> model loaded<br> ";
		}

		public function viewRenderEnded() {
			echo "<br>render ended";
		}
		*/
	}
