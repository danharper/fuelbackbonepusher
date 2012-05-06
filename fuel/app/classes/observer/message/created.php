<?php
class Observer_Message_Created extends \Orm\Observer
{
	public function after_insert(\Orm\Model $obj)
	{
		\Pusherapp::forge()->trigger('fuelbbpusher', 'new_message', Format::forge($obj)->to_array());
	}
}