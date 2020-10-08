<?php

class View
{
	public function generate($pattern,$filename,$data)
	{
		$pattern_filename = "views/patterns/".$pattern."_view.php";
		$view_filename = "views/views/".$filename."_view.php";
		
		if(file_exists($pattern_filename))
		{
			include($pattern_filename);
		}
		else
		{
			throw new BadPatternfileException();
		}

		if(file_exists($view_filename))
		{
			include($view_filename);
		}
		else
		{
			throw new BadViewfileException();
		}
		$_SESSION["data"] = $data;
	}
}