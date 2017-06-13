<?php

namespace CoreApp\Controller;

	use \CoreApp;

	class User extends CoreApp\InnerController {

		public function __construct() {
			parent::__construct(ClassName(__CLASS__));
			$this->model = $this->loadModel(ClassName(__CLASS__));
		}

		public function data($arg) {
			return $this->model->getData($arg);
		}

		public function getAdminGroup() {
			return $this->model->getAdminGroup();
		}

		public function getModules() {
			return $this->model->getModules();
		}

	}
