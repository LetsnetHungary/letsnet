<?php
	class Index extends CoreApp\ViewController {

		public function __construct() {

			parent::__construct(__CLASS__);

			$this->a->userShouldChangeLocation("../AuthTest");

			$user = new CoreApp\Controller\User();


			$this->v->modules = $user->getModules();
			$this->v->userData = $user->getUserData();
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
