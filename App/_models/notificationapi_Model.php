<?php

  class notificationapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function lekeres() {
      /*
      $id = "valami";

      $c = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>notificationDB"));

      $stmt = $c->prepare("SELECT * FROM notifcations WHERE id = :id ");
      $stmt->execute(array(
        ":id" => $id
      ));

      $result = $stmt->fetchAll(PDO::FETCH_NUM);

      return $result;

      */
    }
  }
