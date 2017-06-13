<?php
	class Index extends CoreApp\ViewController {
		public function __construct() {
			parent::__construct(__CLASS__);

			$this->a->userShouldChangeLocation("../AuthTest");

			$user = new CoreApp\User();

			print_r($user);

			print_r($user->getModules()); die();
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
