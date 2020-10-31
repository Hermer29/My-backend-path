<?php
include("core/exceptions.php");


class Pathfinder
{
	private $controller;

	private function __construct(string $controller)
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
			$this -> controller = new $controller_classname();
		}
		else
		{
			throw new ControllerException("No such controller in controller's folder");
		}
	}
	
	private function find_action(string $action)
	{
		$action_name = $action . "_action";
		
		if(method_exists($this -> controller,$action_name))
		{
			return $this -> controller -> $action_name();
		}
		else if($action == null)
		{
			return $this -> controller -> index_action();
		}
		else
		{
			throw new ActionException("No such method in controller class");
		}
	}
	
	
}

class UriCutter
{
	public function get_uri()
	{
		$uri = $_SERVER["REQUEST_URI"];
		$uri = trim("/",$uri);
		return explode("/", $uri);
	}
}

class Router
{
	
	public static function find_route()
	{
		try
		{
			$uri_handler = new UriCutter();
			$uri = $uri_handler -> get_uri();
			print_r($uri);

			$controller;
			$uri;
			
			if(count($uri) == 1)
			{
				$controller = $uri[0];
				$action = "index_action";
			}
			else if(count($uri) == 2)
			{
				$controller = $uri[0];
				$action = $uri[1];
			}
			
			if($controller == null)
			{
				Router::index();
				exit;
			}

			$pathfinder = new Pathfinder($controller);
		
			$pathfinder -> find_action($action);
			exit;
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
	
	public static function index()
	{
		
		exit;
	}
}