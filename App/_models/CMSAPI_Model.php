<?php

    class CMSAPI_Model extends CoreApp\Model {

       public function __construct() {
            parent::__construct();

            CoreApp\User::init();
            $this->logged_user = CoreApp\User::LoggedSession();
            $this->devicekey = CoreApp\User::Devicekey();
            $this->webshopdb = CoreApp\User::Webpage();
        }

        public function uploadSections($sections) {
          $c_sections = count($sections);

          for($i=0; $i<$c_sections; $i++) {
            $server_output = $this->CMSCURLResponse($sections[$i]);
            switch ($sections[$i]["type"]) {
              case 'text':
                $this->uploadJSON($server_output, $sections[$i]["view"], $sections[$i]["section_name"]);
                break;
              case 'imageset':
              $this->imageSetJson($server_output, $sections[$i]);
                break;
              case 'itemset':
                $this->itemSetJson($server_output, $sections[$i]);
                break;
              default:
                # code...
                break;
            }
            print_r($server_output);
          }
        }

        private function imageSetJSON($server_output, $section) {
          $response = json_decode($server_output);

          $this->uploadJSON($response, $section["view"], $section["section_name"]);

          $r = array();
          $k = 0;
          foreach ($response as $key => $value) {
            $r[$k]["id"] = $key;
            $r[$k]["src"] = $value;
            $k++;
          }

          $records = $section["records"];
          $c_records = count($records);

          for($i=0; $i < $c_records; $i++) {
            if($records[$i]["imgtype"] == "new") {
              $type = explode("/", $records[$i]["type"]);
              $src = "_cms/$this->webshopdb/_img/".$section["view"]."/".$section["section_name"]."/".$r[$i]["id"].".$type[1]";
              $data = base64_decode($records[$i]["data"]);
              file_put_contents($src, $data);
            }
          }
        }

        private function itemSetJson($server_output, $section) {
          $records = $section["records"];
          $c_records = count($records);

          for($i=0; $i < $c_records; $i++) {
            if($records[$i]["itemtype"] == "new") {
              $type = explode("/", $records[$i]["image"]["type"]);
              $src = "_cms/$this->webshopdb/_img/".$section["view"]."/".$section["section_name"]."/".$records[$i]["prodid"].".$type[1]";
              $data = base64_decode($records[$i]["image"]["data"]);
              file_put_contents($src, $data);
            }
          }

          $su = json_decode($server_output);

          foreach ($su as $key => $value) {
            $type = explode("/", $value->imagetype);
            $su->$key->imagesrc = "../../_cms/$this->webshopdb/_img/".$section['view']."/".$section['section_name']."/".$key.".".$type[1];
          }
          $this->uploadJSON($su, $section["view"], $section["section_name"]);
        }

        private function CMSCURLResponse($section) {
          $type = $section["type"];

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL,"http://a.$this->webshopdb".CoreApp\ServerHandler::curlEnding()."/CMSAPI/$type");
          curl_setopt($ch, CURLOPT_POST, 1);

          curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array(
              'logged_user' => $this->logged_user,
              "devicekey" => $this->devicekey,
              "section" => $section
          )));

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $server_output = curl_exec($ch);
          curl_close($ch);
          return ($server_output);
        }
        private function uploadJSON($content, $view, $section) {
          if(is_object($content) || is_array($content)) {
            $content = json_encode($content);
          }
          $json = "_cms/$this->webshopdb/_jsons/".$view."/".$section.".json";
          $f = fopen($json, "w");
          fwrite($f, $content);
        }
    }
