<?php

namespace CoreApp\Model;

	use \CoreApp;
	use \PDO;

	class User_Model extends CoreApp\DataModel {

		public function __construct() {
			parent::__construct();
		}

		public function getData($arg) {
			return Session::get($arg);;
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

		public function getModules() {
			$DB = $this->database->PDOConnection(AppConfig::getData("database=>modulesDB"));
			$stmt = $this->DB->prepare("SELECT modulesstore.module, modulesstore.modulename, GROUP_CONCAT(DISTINCT CONCAT(modulesstore.pagemodulename,',',modulesstore.pagemodule) SEPARATOR ';') FROM modules INNER JOIN modulesstore ON (modules.module = modulesstore.module) WHERE modules.admingroup = :admingroup GROUP BY modules.module");
			$stmt->execute(array(
				":admingroup" => Session::get("admingroup")
			));
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
	}
