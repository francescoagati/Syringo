<?php

class haxe_unit_TestStatus {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->done = false;
		$this->success = false;
	}}
	public $done;
	public $success;
	public $error;
	public $method;
	public $classname;
	public $posInfos;
	public $backtrace;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	function __toString() { return 'haxe.unit.TestStatus'; }
}
