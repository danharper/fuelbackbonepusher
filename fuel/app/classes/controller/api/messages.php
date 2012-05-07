<?php

class Controller_API_Messages extends Controller_API
{

	public function get_index()
	{
		$this->response(Model_Message::get_all());
		return;
	}

	public function post_index()
	{
		$data = json_decode(Input::post('model'), true);
		Log::debug(print_r($data, true), 'POST');

		if ( ! $data['name'] || ! $data['text'])
			return $this->response(array('message' => 'Name and Message should be provided.'), 400);

		$params = array(
			'name' => $data['name'],
			'text' => $data['text'],
		);

		$model = new Model_Message($params);

		if ( ! $model->save())
			return $this->response(array('message' => 'Failed to save.'), 500);

		return $this->response($model, 201);
	}

}