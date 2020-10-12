<?php
include("core/exceptions.php");

class Router
{
	public static function find_route()
	{
		try
		{
			$request_uri = $_SERVER['REQUEST_URI'];
			$request_uri = preg_split("#\/\w#",$request_uri);
			foreach($request_uri as $elem)
			echo $elem;
			exit;
			$pattern_solo_controller = "#^\/\w{4,30}\/$#i";
			$pattern_controller_action = "#^\/\w{4,30}\/\w{5,200}$#i";

			if($request_uri == "/")
			{
				Router::index();
			}
			else if((boolean)preg_match($pattern_solo_controller,$request_uri))
			{ //If uri has format localhost/controller;
				$controller = trim($request_uri,"/");
				
				$controller_instance = Router::find_controller($controller);
				$controller_instance -> index_action();
			}
			else if((boolean)preg_match($pattern_controller_action,$request_uri))
			{ //If uri = localhost/controller/action
				$request_uri = preg_split("#\/\w#",$request_uri);
				$controller  = $request_uri[0];
				$action      = $request_uri[1];
				
				$controller_instance = Router::find_controller($controller);
				Router::find_action($action,$controller_instance);
			}
			else
			{
				throw new Exception();
			}
		}
		catch (Exception $e)
		{
			include("controllers/error_controller.php");
			$controller_instance = new error_controller();
			$error_info = ["TRACE" => $e->getTraceAsString()];
			
			if($e instanceof ActionException)
			{
				$error_info[] = ["ERROR_CODE" => "ACTION_EXCEPTION"];
			}
			else if($e instanceof ControllerNotFoundException)
			{
				$error_info[] = ["ERROR_CODE" => "CONTROLLER_EXCEPTION"];
			}
			else
			{
				$error_info[] = ["ERROR_CODE" => "UNKNOWN_EXCEPTION"];
			}
			
			$controller_instance->index_action($error_info);
		}

	}
		private static function index()
		{
			header("Location: /main/");
			exit;
		}

		private static function find_action(string $action, Controller $controller)
		{
			$action_name = $action . "_action";
			
			if(method_exists($controller,$action_name))
			{
				return $controller -> $action_name();
			}
			else if($action == null)
			{
				return $controller -> index_action();
			}
			else
			{
				throw new ActionException("No such method in controller class");
			}
		}
		
		private static function find_controller(string $controller)
		{
			$controller_classname = 
				strtolower($controller).
				"_controller";

			$controller_filename  =
				"/controllers/".
				$controller_classname.
				".php";

			if(file_exists($controller_filename))
			{
				include($controller_filename);
				$controller_instance = new $controller_classname();
				return $controller_instance;
			}
			else
			{
				throw new ControllerNotFoundException("No such controller in controller's folder");
			}
		}

		
		
}