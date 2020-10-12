<?php

class error_controller extends Controller
{
	public function index_action($details)
	{
		$this->view->generate(
			"errorpage",
			"empty_pattern",
			$details);
	}
}