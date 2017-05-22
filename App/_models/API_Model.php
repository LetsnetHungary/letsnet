<?php
    class API_Model extends CoreApp\DataModel {

        public function __construct() {
            parent::__construct();


            $this->logged_user = CoreApp\Session::get("logged_user");
            $this->devicekey = CoreApp\Session::get("devicekey");
            $this->webshopdb = CoreApp\Session::get("sitekey");
        }

        public function orderAPIviewProduct($p) {
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/View");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "id" => $p["id"])));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          return ($server_output);
        }

        public function orderAPIsetState($p) {
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/setState");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "id" => $p["id"], "state" => $p["state"])));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          return ($server_output);
        }

        public function orderAPInotVisible($p) {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/Delete");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "id" => $p["id"])));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          return ($server_output);
        }

        public function commissionAPIaddCommission($p) {

          $data = array();
          $data["product"] = $p["product"];
          $data["name"] = $p["name"];
          $data["price"] = $p["price"];
          $data["count"] = $p["count"];
          $data["deadline"] = $p["deadline"];

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/addCommission");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "data" => $data)));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          return ($server_output);
        }

        public function commissionAPIdeleteCommission($p) {

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/deleteCommission");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "id" => $p["id"])));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          return ($server_output);
        }

        public function commissionAPIrefreshCount($p) {

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/refreshCount");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "id" => $p["id"], "count" => $p["count"])));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          return ($server_output);
        }

        public function sellsAPIaddFriendlySold($p) {

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/addFriendlySold");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "id" => $p["id"], "count" => $p["count"])));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          return ($server_output);
        }

        public function sellsAPIaddStock($p) {

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/addStock");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "id" => $p["id"], "count" => $p["count"])));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          return ($server_output);
        }

        public function sellsAPIaddShopStock($p) {

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/OAPI/addShopStock");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('logged_user' => $this->logged_user, "devicekey" => $this->devicekey, "id" => $p["id"], "count" => $p["count"])));

          // receive server response ...
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $server_output = curl_exec ($ch);

          curl_close($ch);
          echo "asdas";
          print_r($server_output);
          return ($server_output);
        }

        public function usersAPInewDevice($data) {
          $email = $data["email"];
          $dn = $data["devicename"];
          $dk = $data["devicekey"];

          $stmt = $this->db->prepare("SELECT uniquekey FROM users WHERE email = :email");
          $stmt->execute(array(
            ":email" => $email
          ));
          if($r = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $stmt = $this->db->prepare("INSERT INTO devices (devicekey, uniquekey, devicename) VALUES (:devicekey, :uniquekey, :devicename)");
            $stmt->execute(array(
              ":devicekey" => $dk,
              ":uniquekey" => $r[0]["uniquekey"],
              ":devicename" => $dn
            ));
            echo "New Devicekey has been inserted...";
          }
        }

        public function usersAPInewUser($data) {

          $options = [
              'cost' => 12,
          ];

          $uniquekey = $this->generateID(10);
          $adminkey = $this->generateID(30);

          $password =  password_hash($data["password"], PASSWORD_BCRYPT, $options);

          $stmt = $this->db->prepare("INSERT INTO users (email, password, fname, lname, uniquekey, adminkey, allow, sitekey, webshopdb) VALUES (:email, :password, :fname, :lname, :uniquekey, :adminkey, :allow, :sitekey, :webshopdb)");
          $stmt->execute(array(
            ":email" => $data["email"],
            ":password" => $password,
            ":fname" => $data["firstname"],
            ":lname" => $data["lastname"],
            ":uniquekey" => $uniquekey,
            ":adminkey" => $adminkey,
            ":allow" => $data["access"],
            ":sitekey" => $data["page"],
            "webshopdb" => $data["pagedb"]
          ));

          $stmt = $this->db->prepare("INSERT INTO userData (uniquekey, shopname, firstname, lastname, birth, status) VALUES (:uniquekey, :shopname, :firstname, :lastname, :birth, :status)");
          $stmt->execute(array(
            ":uniquekey" => $uniquekey,
            ":shopname" => $data["page"],
            ":firstname" => $data["firstname"],
            ":lastname" => $data["lastname"],
            ":birth" => $data["birth"],
            ":status" => $data["status"]
          ));

          $modules = $data["modules"];
          $c_modules = count($modules);

          for($i = 0; $i < $c_modules; $i++) {
              $stmt = $this->db->prepare("SELECT * FROM modulesstore WHERE name = :name");
              $stmt->execute(array(
                ":name" => $modules[$i]
              ));
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

              $stmt = $this->db->prepare("INSERT INTO pages (sitekey, adminkey, allow, name, redirect, icon, lmodule) VALUES (:sitekey, :adminkey, :allow, :name, :redirect, :icon, :lmodule)");
              $stmt->execute(array(
                ":sitekey" => $data["page"],
                ":adminkey" => $adminkey,
                ":allow" => $data["access"],
                ":name" => $result[0]["name"],
                ":redirect" => $result[0]["redirect"],
                ":icon" => $result[0]["icon"],
                ":lmodule" => $result[0]["lmodule"]
              ));
          }
          return;
        }

        private function generateID($length) {
              return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
        }

        public function logout() {
          $uh = new CoreApp\Controller\UserHandler();
          $uh->logout();
          header("location: ../AuthTest");
        }
    }
