<?php

  class usersapi_Model extends CoreApp\DataModel {

    public function __construct() {
      parent::__construct();
    }

      /* NEW USER SECTION */

      /* CHECK IF WE HAVE ALL THE DATA */

      public function newuser($data) {
      if(empty_recursive($data)) {
        $this->response->setResponse("message", "Kérjük töltsön ki minden mezőt!");
        CoreApp\Log::log(__CLASS__, "newuser", "Missing data from NEWUSER FORM");
        $this->response->Send();
      }

      /* END CHECKING */

      /* SEARCH IF WE HAVE AUSER WITH THE SAME EMAIL */

      $uniquekey = $this->generateID(10);

        try {
          $USERDB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>autchenticationDB"));
          $stmt = $USERDB->prepare("SELECT id FROM users WHERE email = :email OR uniquekey = :uniquekey");
          $stmt->execute(array(
            ":email" => $data["email"],
            ":uniquekey" => $uniquekey
          ));

          if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            CoreApp\Log::log(__CLASS__, "newuser", "An existing user has the same UNIQUEKEY ($uniquekey) or EMAIL (".$data["email"].") ...");
            $this->response->setResponse("message", "Ilyen email, UNIQUEKEY már létezik!");
            CoreApp\Log::log(__CLASS__, "destruct", json_encode($this->log));
            $this->response->Send();
          }
        }
        catch(PDOException $e) {
          $this->log["newuser"]["PDOERROR"]["USERDB"]["CHECK"] = $USERDDB->errorInfo();
        }

        /* END SEARCH */

        /* MAIN USER UPLOAD */

        /* SETTING UP UNIQUE CREDENTIALS  (uniquekey generated before) */

        $adminkey = $this->generateID(30);
        $password =  $this->user_password_hash($data["password"]);

        try {
          $stmt = $USERDB->prepare("INSERT INTO users (`email`, `password`, `uniquekey`, `adminkey`, `allow`, `sitekey`, `database`) VALUES (:email, :password, :uniquekey, :adminkey, :allow, :sitekey, :database)");
          $stmt->execute(array(
            ":email" => $data["email"],
            ":password" => $password,
            ":uniquekey" => $uniquekey,
            ":adminkey" => $adminkey,
            ":allow" => $data["allow"],
            ":sitekey" => $data["sitekey"],
            ":database" => $data["database"]
          ));
        }
        catch (PDOException $e) {
          $this->log["newuser"]["PDOERROR"]["USERDB"] = $e;
          $this->log["newuser"]["error"]["USERDB"]["errorInfo"] = $USERDB->errorInfo();
          $this->log["newuser"]["error"]["USERDB"]["stmt"] = $stmt->errorInfo();
        }

        $USERSDB = null;

        /* MAIN USER UPLOAD END */

        $this->database->Restore();

        /* USER DATA UPLOAD */

       try {
          $DATADB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>dataDB"));
          $stmt = $DATADB->prepare("INSERT INTO userData (uniquekey, shopname, firstname, lastname, birth, status, startpage) VALUES (:uniquekey, :shopname, :firstname, :lastname, :birth, :status, :startpage)");
          $stmt->execute(array(
            ":uniquekey" => $uniquekey,
            ":shopname" => $data["sitekey"],
            ":firstname" => $data["firstname"],
            ":lastname" => $data["lastname"],
            ":birth" => $data["birth"],
            ":status" => $data["status"],
            ":startpage" => "Index"
          ));
        }
        catch(PDOException $e) {
          $this->log["newuser"]["PDOERROR"]["DATADB"] = $e;
          $this->log["newuser"]["error"]["DATADB"]["errorInfo"] = $DATADB->errorInfo();
          $this->log["newuser"]["error"]["DATADB"]["stmt"] = $stmt->errorInfo();
        }

        $DATADB = null;

        $this->database->Restore();

        /* USER DATA UPLOAD END */

        /* USER'S MODULES UPDATE */

        if($this->updateUserModules($uniquekey, $data["sitekey"], $data["modules"])) {
          $this->log["newuser"]["modules"] = "User's ($uniquekey) modules OK";
        }
        else {
          $this->log["newuser"]["error"]["modules"] = "There was some error at the modules ($uniquekey)";
        }

        /* USER'S MODULES UPDATE END */

      }

      private function user_password_hash($password) {
        $options = [
            'cost' => 14
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        return $password;
      }

      private function generateID($length) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
      }

      /* NEW USER SECTION END */

      /* USER MODULES SECTION */

      private function updateUserModules($uniquekey, $sitekey, $modules) {

        try {
          $MODULESDB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>modulesDB"));
          $stmt = $MODULESDB->prepare("SELECT viewid FROM modules WHERE uniquekey = :uniquekey AND sitekey = :sitekey");
          $stmt->execute(array(
            ":uniquekey" => $uniquekey,
            ":sitekey" => $sitekey
          ));

          if($result = $stmt->fetchAll(PDO::FETCH_NUM)) {
            $oldmodules = $result[0];

            /* UPDATING */
          }
          else {

            /* NEW USER */

            $modulesforupload = array();

            $c_m = count($modules);

            for($i=0; $i < $c_m; $i++) {
              $stmt = $MODULESDB->prepare("SELECT * FROM modulesstore WHERE viewid = :viewid");
              $stmt->execute(array(
                ":viewid" => $modules[$i]
              ));
              if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                $modulesforupload[$i] = $result[0];
              }
            }

            $c_m = count($modulesforupload);
            for($i=0; $i < $c_m; $i++) {
              $stmt = $MODULESDB->prepare("INSERT INTO modules (viewid, sitekey, uniquekey, allow, name, redirect, icon, lmodule) VALUES (:viewid, :sitekey, :uniquekey, :allow, :name, :redirect, :icon, :lmodule)");
              $stmt->execute(array(
                ":viewid" => $modulesforupload[$i]["viewid"],
                ":sitekey" => $sitekey,
                ":uniquekey" => $uniquekey,
                ":allow" => "---",
                ":name" => $modulesforupload[$i]["name"],
                ":redirect" => $modulesforupload[$i]["redirect"],
                ":icon" => $modulesforupload[$i]["icon"],
                ":lmodule" => $modulesforupload[$i]["lmodule"]
              ));
            }
          }
        }
        catch(PDOException $e) {
          $this->log["newusermodules"]["PDOERROR"]["MODULESDB"] = $e;
        }

        $MODULESDB = null;
        $this->database->Restore();

      }

      /* USER MODULES SECTION END */

      /* NEW DATABASE SECTION */

      public function newDatabase($key, $value) {
        try {
          $DATADB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>dataDB"));
          $stmt = $DATADB->prepare("INSERT INTO databasekeys (databasename, databasekey) VALUES (:databasename, :databasekey) ");
          $stmt->execute(array(
            ":databasename" => $value,
            ":databasekey" => $key
          ));

          $this->log["newdatabase"]["message"] = "New database (key : $key) (value : $value) has been uploaded.";
          return;
        }
        catch(PDOException $e) {
          $this->log["newdatabase"]["PDOERROR"]["MODULESDB"] = $e;
          $this->log["newdatabase"]["error"]["DATADB"]["errorInfo"] = $DATADB->errorInfo();
          $this->log["newdatabase"]["error"]["DATADB"]["stmt"] = $stmt->errorInfo();
        }

        $DATADB = null;
      }

      /* NEW DATABASE SECTION END */

      /* NEW SITE SECTION END */

      public function newSite($key, $value) {
        try {
          $DATADB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>dataDB"));
          $stmt = $DATADB->prepare("INSERT INTO sitekeys (sitename, sitekey) VALUES (:sitename, :sitekey) ");
          $stmt->execute(array(
            ":sitename" => $value,
            ":sitekey" => $key
          ));

          $this->log["newsite"]["message"] = "New site (key : $key) (value : $value) has been uploaded.";
          return;
        }
        catch(PDOException $e) {
          $this->log["newsite"]["PDOERROR"]["MODULESDB"] = $e;
          $this->log["newsite"]["error"]["DATADB"]["errorInfo"] = $DATADB->errorInfo();
          $this->log["newsite"]["error"]["DATADB"]["stmt"] = $stmt->errorInfo();
        }

        $DATADB = null;
      }

      /* NEW SITE SECTION END */

      /* NEW DEVICEKEY SECTION */

      public function newDevicekey($data) {

        try {
          $USERDB = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>autchenticationDB"));
          $stmt = $USERDB->prepare("SELECT uniquekey FROM users WHERE email = :email");
          $stmt->execute(array(
            ":email" => $data["email"]
          ));

          $uniquekey = $stmt->fetchAll(PDO::FETCH_ASSOC); $uniquekey = $uniquekey[0]["uniquekey"];

          $stmt = $USERDB->prepare("INSERT INTO devices (devicekey, uniquekey, devicename) VALUES (:devicekey, :uniquekey, :devicename)");
          $stmt->execute(array(
            ":devicekey" => $data["devicekey"],
            ":uniquekey" => $uniquekey,
            ":devicename" => $data["devicename"]
          ));

          $this->log["devicekey"]["message"] = "New devicekey (uniquekey : $uniquekey) has been uploaded.";
          return;
        }
        catch (PDOException $e) {
          $this->log["newdevicekey"]["PDOERROR"]["MODULESDB"] = $e;
          $this->log["newdevicekey"]["error"]["DATADB"]["errorInfo"] = $DATADB->errorInfo();
          $this->log["newdevicekey"]["error"]["DATADB"]["stmt"] = $stmt->errorInfo();
        }

        $USERDB = null;
      }

      /* NEW DEVICEKEY SECTION END */

      /* DESTRUCT SECTION */

      public function __destruct() {

        /* DESTRUCT LOG */

        CoreApp\Log::log(__CLASS__, "destruct", json_encode($this->log));

        /* END LOG */
      }

      /* END DESTRUCT SECTION */
  }
