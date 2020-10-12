<?php
session_start();
class main_controller extends Controller
{
	//Must include view file
	public function index_action()
	{
		$this->view->generate(
			"pattern",
			"main",
			["header" => "Hello world!"]);
	}

	public function login_action()
	{
		$this->view->generate(
			"pattern",
			"main",
			["header" => "Hello world!"]);
	}

}