<?php
	namespace App;
	
	class Autoloader{

		public static function register(){
			spl_autoload_register(array(__CLASS__, 'autoload'));
		}

		public static function autoload($class){
			$parts = preg_split('#\\\#', $class);

			$className = array_pop($parts);

			$path = strtolower(implode(DS, $parts));

			$file = $className.'.php';

			$filepath = BASE_DIR.$path.DS.$file;

			if(file_exists($filepath)){
              
				require $filepath;
			}
			
		}
	}