<?php

	/**
	* Letsnet - AppConfig
	*
	* @author Letsnet <info@letsnet.hu>
	* @version 0.1
	* @category CoreApp Class
	* @uses CoreApp namespace
	*
	* Select the configuration type in : index.php ---
	* @var $server_appconfig_file for the server configuration
	* @var $development_appconfig_file for the development configuration
	*/

	namespace CoreApp;

		class AppConfig {

			private static $server_appconfig_file = "App/_config/_server_appconfig.json";
			private static $development_appconfig_file = "App/_config/_development_appconfig.json";

			/**
			* Decides which configuration file to use
			* The function returns to JSON object by default
			* @param bool $bool -> set this true to change the return type to PHP array
			*/

			public static function appConfigFile($bool) {

				if($bool) {
					if(APPCONFIG == "development") {
						return(json_decode(file_get_contents(self::$development_appconfig_file), TRUE));
					}
					else if(APPCONFIG == "server") {
						return(json_decode(file_get_contents(self::$server_appconfig_file), TRUE));
					}
				}
				else {
					if(APPCONFIG == "development") {
						return(json_decode(file_get_contents(self::$development_appconfig_file)));
					}
					else if(APPCONFIG == "server") {
						return(json_decode(file_get_contents(self::$server_appconfig_file)));
					}
				}

			}

			/**
			* Get data from the configuration json file by the arrowString structure
			* @param string $arrowString contains the object data (object=>object)
		    */

			public static function getData($arrowString) {

				$config = self::appConfigFile(FALSE);

				$a = arrowString($arrowString);
				$c_a = count($a);

				for($i = 0; $i < $c_a; $i++) {
					$config = $config->{$a[$i]};
				}

				return($config);

			}

			/* end AppConfig CLASS */
		}
