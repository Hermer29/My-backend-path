<?php

class error_controller extends Controller
{
	public function unknown_error()
	{
		$this->view->generate(
			"empty_pattern",
			"errorpage",
			array(
				"errorcode" =>
					"UNKNOWN_ERROR")
			);
	}

	public function bad_controller()
	{
		$this->view->generate(
			"empty_pattern",
			"errorpage",
			array("errorcode" => "BAD_CONTROLLER")
		);
	}

	public function bad_action()
	{
		$this->view->generate(
			"empty_pattern",
			"errorpage",
			array(
				"errorcode" => "BAD_ACTION")
		);
	}
}