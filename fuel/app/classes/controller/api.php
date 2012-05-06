<?php

class Controller_API extends Controller_Rest
{

	public function get_index()
	{
		$this->response('This is the API.');
		return;
	}

}