<?php

include("core/model.php");

class main_model extends Model
{
	public function get_data()
	{
		return array("someinfo1","someinfo2");
	}
}