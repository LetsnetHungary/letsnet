<?php
	class Index extends CoreApp\ViewController {

		public function __construct() {
			parent::__construct(__CLASS__);
			$this->a->userShouldChangeLocation("../AuthTest");
			$this->setUserModules(__CLASS__);
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
