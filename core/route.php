<?php

class Route
{
	public function GetRoute()
	{
		$arr = explode("/",$_SERVER["REQUEST_URI"]);
		$controller = $arr[0];
		$view = $arr[1];
		
		if($controller == null)
		{
			Route::IndexAction();
			return;
		}

		$filename = "controllers/".
					strtolower($controller).
					"_controller".
					".php";
					
		if(file_exists($filename))
		{
			include($filename);
			
		}
		
	}

	public function IndexAction()
	{
		include("controllers/main_controller.php");
		$controller = new main();
		echo $controller->index();
	}
}