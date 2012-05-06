<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2011 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Pusherapp;

require_once PKGPATH.'pusherapp'.DS.'vendor'.DS.'Pusher'.DS.'Pusher.php';

use Pusher;

class PusherException extends \FuelException {}

class Pusherapp
{
	private static $_instance = null;
	
	private function __construct() {}
	
	private function __clone()
	{
		throw new \PusherException('Cloning is not allowed');
	}
	
	public static function _init()
	{
		\Config::load('pusher', true);
	}
	
	/**
	 * Initiate Pusher instance for singleton method
	 *
	 * @access    public
	 * @param  boolean 
	 * @return static
	 */
	public static function forge($debug = false)
	{
		$config = \Config::get('pusher');
		
		if (static::$_instance != null) return static::$_instance;
		
		static::$_instance = new Pusher(
			$config['auth_key'],
			$config['secret'],
			$config['app_id'],
			$debug,
			$config['host'],
			$config['port'],
			$config['timeout']
		);
		
		return static::$_instance;
	}
	
	/**
	 * Set instance for mock up
	 *
	 * @access    public
	 * @return static
	 */
	public static function instance($pusher)
	{
		return static::$_instance = $pusher;
	}
}

