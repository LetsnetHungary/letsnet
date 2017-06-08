<?php

    class CMSAPI extends CoreApp\InnerController {

        public function __construct() {
            parent::__construct(__CLASS__);
        }

        public function sections() {
          $sections = $_POST["sections"];
          return $this->model->uploadSections($sections);
        }
    }
