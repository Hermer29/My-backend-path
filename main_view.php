<?php

include_once("core/view.php");

class main extends View
{
	public function generate($data)
	{
		if(length($data) != 2)
		{
			throw new 
				InvalidArgumentException("data array must be size 2");
		}
		$data1 = $data[0];
		$data2 = $data[1];
		return <<<HTML
		<!doctype html>
		<html>
			<head>
				<title>
					Mainpage
				</title>
			</head>
			<body>
				on main page <br>
				$data1 <br>
				$data2 <br>
			</body>
		</html>
		HTML;
	}
	
}