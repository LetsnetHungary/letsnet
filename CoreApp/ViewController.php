<?php

namespace CoreApp;

	abstract class ViewController extends Controller {

		protected $v;
		protected $a;
		public $user;

		public function __construct($objectname) {

			/* Create View Object, SEO and stuff */
			$this->v = new View($objectname);
			$this->v->setPageConfig(SEO::getPageConfig($objectname));

			/* Authentication Object */
			$this->a = $this->setAuthentication();	
		}

		protected function viewDisplay($customheader) {
			$this->v->render($customheader);
			$this->viewRenderEnded();
		}

		public function showView($bool) {
			$this->viewDisplay($bool);
		}

   		protected function viewRenderEnded() {
			//echo '<br>render ended...';
		}

		protected function setUserModules($class) {
			
			/* User Object */
			$this->user = new Controller\User();

			$everypagemodules = $this->user->getEveryPageModules();
			$this->v->everypagemodules = !empty($everypagemodules) ? $everypagemodules : 0; /* View's render function loads the UserModules */

			/* activate  user's modules PHP files */
			$this->pageModulesPHP($everypagemodules);

			$pagemodules = $this->user->getPageModules($class);
			$this->v->pagemodules = !empty($pagemodules) ? $pagemodules : 0; /* View's render function loads the UserModules */

			/* activate  user's modules PHP files */
			$this->pageModulesPHP($pagemodules);
		}
	}
