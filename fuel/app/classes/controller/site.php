<?php

class Controller_Site extends Controller
{

	public function action_index()
	{
		$view = View::forge('site/index');

		$messages = Format::forge(Model_Message::get_all())->to_json();
		$view->bind('messages', $messages, false);

		return Response::forge($view);
	}

}