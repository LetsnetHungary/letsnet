<?php
    class Users_Model extends CoreApp\DataModel {
        public function __construct() {
            parent::__construct();
            $this->MODULESDB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>modulesDB"));
            $this->database->Restore();
            $this->USERDB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>dataDB"));
            $this->database->Restore();
            $this->AUTH = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>autchenticationDB"));
            $this->database->PDOClose();
        }

        public function getModules() {
          $stmt = $this->MODULESDB->prepare("SELECT viewid, name FROM modulesstore");
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return($result);
        }

        public function getSites() {
          $stmt = $this->USERDB->prepare("SELECT sitename, sitekey FROM sitekeys");
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return($result);
        }

        public function getDBs() {
          $stmt = $this->USERDB->prepare("SELECT databasename, databasekey FROM databasekeys");
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $result;
        }

        public function getUsers() {
          $stmt = $this->AUTH->prepare("SELECT email FROM users");
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $result;
        }
    }
