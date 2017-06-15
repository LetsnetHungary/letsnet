<?php

namespace CoreApp;

	class View {

		protected $mainHead;
		protected $mainHeader;
		protected $mainFooter;
		protected $viewName;
		protected $seodata;
		protected $jsdata;
		protected $cssdata;
		protected $title = "...Letsnet...";
		protected $charset = "UTF-8";

		protected $pageModules;

		public function __construct($viewname) {
			$this->mainHead = "_views/_includes/_heads/_main.php";
			$this->mainHeader = "_views/_includes/_headers/_main.php";
			$this->mainFooter = "_views/_includes/_footers/_main.php";
			$this->viewName = "_views/$viewname/index.php";
			$this->custom_head = "_views/$viewname/head.php";
			$this->custom_header = "_views/$viewname/header.php";
			$this->custom_footer = "_views/$viewname/footer.php";
		}

		public function render() {
			$this->rHead();
			$this->rEveryPageModules();
			require $this->viewName;
			$this->rUserModules();
			$this->rF();
		}

		private function rHead() {
			if(file_exists($this->custom_head)) {
				require $custom_head;
				return;
			}
			require $this->mainHead;
			return;
		}

		private function rEveryPageModules() {
			if($this->everypagemodules) {
				return $this->loadModules($this->everypagemodules);
			}
			return false;
		}

		private function rUserModules() {
			if($this->pagemodules) {
				$this->loadModules($this->pagemodules);
			}
		}

		private function rHeader() {
			if(file_exists($this->custom_header)) {
				require $custom_header;
				return;
			}
			require $this->mainHeader;
			return;
		}

		private function rF() {
			if(file_exists($this->custom_footer)) {
	        	require $custom_footer;
			}
			else {
				require $this->mainFooter;
			}
		}

		public function setPageConfig($pageconfig) {
			$this->pageconfig = $pageconfig;
			$this->seo = $pageconfig->seo;
			$this->title = $this->seo->title;
			$this->charset = $this->seo->charset;
			$this->jsdata = $pageconfig->js;
			$this->cssdata = $pageconfig->css;
		}

		public function loadModules($pagemodules) {
			$c_p = count($pagemodules);

			for ($i = 0; $i < $c_p; $i++) {
				$path = "modules/views/".$pagemodules[$i]["fr"]."/".$pagemodules[$i]["module"].".php";
				$this->addModule($path);
			}
		}

		public function addModule($path) {
			include($path);
			return;
		}
	}
