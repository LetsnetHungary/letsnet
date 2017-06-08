<?php

    class Auth_Model extends CoreApp\DataModel {
        public function __construct() {
          parent::__construct();
          $this->PDO = $this->database->PDOConnection(CoreApp\AppConfig::getData("database=>autchenticationDB"));
          $this->database->PDOClose();
        }

        public function getLocation($la, $lo) {
            //Send request and receive json data by latitude and longitude
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($la).','.trim($lo).'&sensor=false';
            $json = @file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;
            if($status=="OK"){
                //Get address from json data
                $location = $data->results[0]->formatted_address;
            }
            else{
                $location =  "We're not able to get your position.";
            }
            //Print address
            echo $location;
        }

        public function newAttemptUser($data) {
          //Creating the new Attempt User
          $a = new CoreApp\AttemptUser();

          //Setting it's properties
          $a->aemail = $data["ema"];
          $a->apassword = $data["passw"];
          $a->devicekey = $data["dk"];
          $a->lalo = $data["lalo"];

          //XSS, INJECTION ECT...
          $a->prepareCredentials();

          //return to the attemptuser
          return $a;
        }
    }
