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

		public function getPageName() {
			return "nincs ilyen még";
		}

		public function getPages() {
			return $this->model->getPages();
		}

		public function getPageModules($from) {
			return $this->model->getPageModules($from);
		}

		public function getEveryPageModules() {
			return $this->model->getEveryPageModules();
		}

		public function getUserData() {
			return $this->model->getUserData();
		}

	}
