<?php

namespace CoreApp\Controller;
use \CoreApp;

	class Analytics extends CoreApp\InnerController {

		public function __construct() {
			parent::__construct($this->ClassName(__CLASS__));
		}

		/*
		public function modelDidLoad()
		{
			echo "model loaded <br>";
		}
		*/
	}
