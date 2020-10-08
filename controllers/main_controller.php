<?php

class main_controller extends Controller
{
	//Must include view file
	public function index_action()
	{
		$this->view->generate(
			"pattern",
			"main",
			array(
				"header" => "Hello world!"));
	}

	public function login_action()
	{
		$this->view->generate(
			"pattern",
			"main",
			array(
				"header" => "Hello world!"));
	}

}