<?php
namespace Libs;
use Exception;
use Exception\PageNotFoundException;

class Route {	
	public static function init()
	{
		
		try {
			$routes = require_once 'src/routes.php';
			$url = $_GET['url'] ?? '/';
			$result = false; //страница не найдена

			foreach ($routes as $key => $value) {
				//echo 'key: ' . $key . '<br>';
				$str = preg_replace("~{.+?}~", "(\d+)", $key);
				//echo 'str: ' . $str . '<br>';
				preg_match('~^' . $str . '$~', $url, $result);
				//echo '<pre>' . print_r($result, true) . '</pre> <hr>';
				if($result) {
					break;
				}
			}

			if( !$result ){
				throw new PageNotFoundException("Страница не найдена");
				
			}
			list($nameController, $nameMethod) = explode('@', $value);
			$pathController = 'Controllers\\' . $nameController;

			if( !file_exists( 'src/' . $pathController . '.php' ) ) {
				throw new Exception ("Controller $nameController not faund");
			}

			$controller = new $pathController();
			if( !method_exists($controller, $nameMethod)){
				throw new Exception ("Method $nameMethod not faund");
			}
			$controller->$nameMethod($result);
		}
		catch(PageNotFoundException $e){
			\View\View::render('errors/404', [], 404);

		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

}