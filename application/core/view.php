<?php
session_start();


class View
{
	public function generate($pattern,$filename,$data)
	{
		$pattern_filename = "application/views/patterns/".$pattern."_view.php";
		$view_filename = "application/views/views/".$filename."_view.php";
		
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