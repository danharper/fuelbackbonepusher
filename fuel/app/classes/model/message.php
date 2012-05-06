<?php

class Model_Message extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'text',
		'created_at',
		'updated_at'
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
		'Observer_Message_Created',
	);

	public static function get_all()
	{
		$models = Model_Message::find()
			->limit(20)
			->get();

		$r = array();
		foreach ($models as $model)
			$r[] = $model;

		return $r;
	}
}
