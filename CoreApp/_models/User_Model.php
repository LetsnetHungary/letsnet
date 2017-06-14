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

			$DB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>modulesDB"));

			$stmt = $DB->prepare("SELECT modulesstore.module, modulesstore.modulename, GROUP_CONCAT(DISTINCT CONCAT(modulesstore.pagemodulename,',',modulesstore.pagemodule) SEPARATOR ';') FROM modules INNER JOIN modulesstore ON (modules.module = modulesstore.module) WHERE modules.admingroup = :admingroup GROUP BY modules.module");
			$stmt->execute(array(
				":admingroup" => CoreApp\Session::get("admingroup")
			));

			$return = array();
			$result = $stmt->fetchAll(PDO::FETCH_NUM);
			
			foreach($result as $row) {
				$return[$row[0]] = array();
				$return[$row[0]]["modulename"] = $row[1];
				$return[$row[0]]["pagemodules"] = array();
				$pagemodules = explode(";", $row[2]);
				foreach($pagemodules as $pm) {
					$pm = explode(",", $pm);
					$return[$row[0]]["pagemodules"][$pm[1]] = $pm[0];
				}
			}

			$this->database->Restore();

			return $return;
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
		
	}
