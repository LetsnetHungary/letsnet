<?php

  class notificationapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

    public function lekeres() {
      $c = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>notificationDB"));

      $stmt = $c->prepare("SELECT notification_content.content, notification_content.id FROM `notification_content` INNER JOIN `notification_props` ON notification_content.id = notification_props.id WHERE notification_props.seen = 0");
      $stmt->execute(array(
    //    ":id" => $id
      ));

      $result = $stmt->fetchAll(PDO::FETCH_NUM);

      $this->set_seen($c, $result[0][1]);

      $return_value = json_decode($result[0][0]);
      return $return_value;
    }

    public function set_seen($c, $id)
    {
      $stmt = $c->prepare("UPDATE `notification_props` SET `seen`= 1  WHERE `id` = :id");
      $stmt->execute(array(
        ":id" => $id
      ));

    }

    public function insertlines()
    {
      $c = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>notificationDB"));

      for ($i=0; $i < 8; $i++) {
        $content = json_encode("elfogyott az".$i);
        $stmt = $c->prepare("INSERT INTO `notification_content`(`content`) VALUES (:content)");
        $stmt->execute(array(
          ":content" => $content
        ));
        $stmt = $c->prepare("INSERT INTO `notification_props`(`seen`, `date`) VALUES (0, :datek)");
        $stmt->execute(array(
          ":datek" => time()
        ));
      }

    }

  }
