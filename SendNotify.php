<?php
require_once('../PushBullet/PushBullet.class.php');
class SendNotify {
	var $_debug = false;
	var $_api_key_array = array(
		array(
			'name'=>'airkiss',
			'key'=>'v1xF8GFxXXWH7sSmOFEbOMUxpmdbLOELlbujAqv0FvGAS',
			'debug'=>1),
/*
		array(
			'name'=>'vincent',
			'key'=>'v1BAEzU10xoffnXC5rAtc5oCHp4uP8Q3WzujxX4iZZrk4',
			'debug'=>0),
		array(
			'name'=>'rockie',
			'key'=>'v1b8c1kiW2Orvpbz1c0FnFIo500IAqmGm9ujD6nk9vNjo',
			'debug'=>0),
		array(
			'name'=>'recca',
			'key'=>'v1RtoP0bsdS0QGNPkwCdTZgFU5mGOAnZXmuju8bckrfpY',
			'debug'=>0),
*/
			);
	function __construct($debug=false,$api_key=NULL)
	{
		$this->_debug = $debug;
		if($api_key !== NULL)
			$this->_api_key_array = $api_key;
	}
	function pushNote($title,$msg)
	{
		foreach($this->_api_key_array as $api)
		{
			if($this->_debug)
			{
				if($api['debug'] === 1)
				{
					$myPushBullet = new PushBullet($api['key']);
					$devices = $myPushBullet->getMyDevices();
					if(count($devices) >= 1)
					{
//						var_dump($devices);
						$myPushBullet->pushNote('my',$title,$msg);
					}
					unset($myPushBullet);
				}
			}
			else
			{
				$myPushBullet = new PushBullet($api['key']);
				$devices = $myPushBullet->getMyDevices();
				if(count($devices) >= 1)
				{
					$myPushBullet->pushNote('my',$title,$msg);
				}
				unset($myPushBullet);
			}
		}
	}

	function pushList($title,$items)
	{
		foreach($this->_api_key_array as $api)
		{
			if($this->_debug)
			{
				if($api['debug'] === 1)
				{
					$myPushBullet = new PushBullet($api['key']);
					$devices = $myPushBullet->getMyDevices();
					if(count($devices) >= 1)
					{
//						var_dump($devices);
						$myPushBullet->pushList('my',$title,$items);
					}
					unset($myPushBullet);
				}
			}
			else
			{
				$myPushBullet = new PushBullet($api['key']);
				$devices = $myPushBullet->getMyDevices();
				if(count($devices) >= 1)
				{	
					$myPushBullet->pushList('my',$title,$items);
				}
				unset($myPushBullet);
			}
		}
	}
}

?>
