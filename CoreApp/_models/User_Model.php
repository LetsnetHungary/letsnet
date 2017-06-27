<?php

namespace CoreApp\Model;

	use \CoreApp;
	use \PDO;

	class User_Model extends CoreApp\DataModel {

		public function __call($method, $args) {
			die();
		}

		public function __construct() {
			parent::__construct();
		}

		public function getData($arg) {
			return Session::get($arg);
		}

		public function getAdminGroup() {
			$DB = $this->database->PDOConnection(AppConfig::getData("database=>modulesDB"));
			$stmt = $this->DB->prepare("SELECT admingroup FROM users WHERE uniquekey = :uniquekey");
			$stmt->execute(array(
				":uniquekey" => Session::get("uniquekey")
			));
			$r = $stmt->fetchAll();
			return $r[0][0];
		}

		public function getPages() {

			$DB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>modulesDB"));

			$stmt = $DB->prepare("SELECT modulesstore.modulename, modulesstore.redirect, modulesstore.icon FROM modulesstore INNER JOIN modules ON (modulesstore.module = modules.module) WHERE modules.admingroup = :admingroup AND modulesstore.type = :type AND modulesstore.fr = :fr");
			$stmt->execute(array(
				":admingroup" => \CoreApp\Session::get("admingroup"),
				":type" => "page",
				":fr" => "---"
			));

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getEveryPageModules($class) {
			
			$DB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>modulesDB"));

			$stmt = $DB->prepare("SELECT COUNT(*) FROM modulesstore WHERE module = :module");
			$stmt->execute(array(
				":module" => $class
			));

			$bool = $stmt->fetchAll();
			if(!$bool[0][0]) {
				return array();
			}

			$stmt = $DB->prepare("SELECT modulesstore.module, modulesstore.modulename, modulesstore.fr FROM modulesstore WHERE modulesstore.type = :type AND modulesstore.fr = :fr");
			$stmt->execute(array(
				":type" => "everypage",
				":fr" => "page"
			));

			$this->database->Restore();

			//return $bool[0][0] ? $stmt->fetchAll(PDO::FETCH_ASSOC) : array();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getPageModules($from) {

			$DB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>modulesDB"));

			$stmt = $DB->prepare("SELECT modulesstore.module, modulesstore.modulename, modulesstore.fr FROM modulesstore INNER JOIN modules ON (modules.module = modulesstore.module) WHERE modules.admingroup = :admingroup AND modulesstore.type = :type AND modulesstore.fr = :fr");
			$stmt->execute(array(
				":admingroup" => CoreApp\Session::get("admingroup"),
				":type" => "pagemodule",
				":fr" => $from
			));

			$this->database->Restore();

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getUserData() {

			$DB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>dataDB"));

			$stmt = $DB->prepare("SELECT userData.firstname, userData.lastname, userData.shopname, userData.status FROM userData WHERE userData.uniquekey = :uniquekey");
			$stmt->execute(array(
				":uniquekey" => CoreApp\Session::get("uniquekey")
			));

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$this->database->Restore();
			return($result[0]);
		}

		public function userAllowedToApiFunction() {
			$DB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>dataDB"));

			$stmt = $DB->prepare("");
			$stmt->execute(array(
				
			));

			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
	}
