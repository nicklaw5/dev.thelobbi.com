<?php
/**
 * Logger Class
 */
class Logger extends Eloquent {

	protected $table = 'logger';
	public $timestamps = false;
	
	public function createLog($class, $method, $description, $url, $uri, $priority)
	{
		$time = date('Y-m-d H:i:s');

		//$log = new Logger();
	    $this->user_id 		= Auth::user()->id;
	    $this->ip_address	= Request::getClientIp();
	    $this->class 		= $class;
	    $this->method 		= $method;
	    $this->description 	= $description;
	    $this->url 			= $url;
	    $this->uri 			= $uri;
	    $this->priority		= $priority;
	    $this->created_at	= $time;
	    $this->save();

	    return $this->getErrorNum($time);
	}

	public function getErrorNum($timestamp) {
		return DB::table($this->table)->where('created_at', $timestamp)->pluck('id');
	}
}