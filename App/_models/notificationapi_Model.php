<?php

  class notificationapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
      $this->c = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>notificationDB"));
    }

    public function lekeres() {

      $stmt = $this->c->prepare("SELECT notification_content.content, notification_content.id FROM `notification_content` INNER JOIN `notification_props` ON notification_content.id = notification_props.id WHERE notification_props.seen = 0");
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    //  $this->set_seen(json_decode($result[0])[1]);
      return json_encode($result);
    }

    public function set_seen($id) {
      $stmt = $this->c->prepare("UPDATE `notification_props` SET `seen`= 1  WHERE `id` = :id");
      $stmt->execute(array(
        ":id" => $id
      ));
    }

    public function insertlines() {
      $types = ["error", "success", "warning", "danger"];
      $message = "Message ";

      for ($i=0; $i < 30; $i++) {
        $message .= $i;

        $content = array();
        $content["type"] = $types[rand(0, 3)];
        $content["message"] = $message;

        $stmt = $this->c->prepare("INSERT INTO `notification_props` (seen, date) VALUES (:seen, :date)");
        $stmt->execute(array(
          ":seen" => 0,
          ":date" => time()
        ));

        $stmt = $this->c->prepare("INSERT INTO `notification_content` (content) VALUES (:content)");
        $stmt->execute(array(
          ":content" => json_encode($content)
        ));

        $message = "Message ";
      }
    }
  }
