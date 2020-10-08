<?php
include("core/exceptions.php");

class Router
{
	public function find_route()
	{
		try
		{
			$uri = explode("/",$_SERVER["REQUEST_URI"]);
			$controller = $uri[0];
			$action = $uri[1];
			
			if($controller == null)
			{
				Router::index();
				exit;
			}

			$controller_instance = 
				Router::find_controller($controller);
		
			Router::find_action(
				$action, 
				$controller_instance);
		
			$model_classname = $controller;
		
			$model_filename = 
				"models/".
				$model_classname.
				"_model.php";
		}
		catch (Exception $e)
		{
			include("controllers/error_controller.php");
			$controller_instance = new error_controller();
			
			if($e instanceof ActionException)
			{
				$controller_instance->bad_action();
			}
			else if($e instanceof ControllerException)
			{
				$controller_instance->bad_controller();
			}
			else
			{
				$controller_instance->unknown_error();
			}
		}

	}
		public function index()
		{
			include("controllers/main_controller.php");
			$controller_instance = new main_controller();
			$controller_instance -> index_action();
		}

		public function find_action(string $action, Controller $controller)
		{
			$action_name = $action . "_action";
			
			if(method_exists($controller,$action_name))
			{
				return $controller -> $action_name();
			}
			else if($action == null)
			{
				return $controller -> index_action;
			}
			else
			{
				throw new ActionException("No such method in controller class");
			}
		}
		
		public function find_controller(string $controller)
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
				throw new ControllerException("No such controller in controller's folder");
			}
		}

		
		
}