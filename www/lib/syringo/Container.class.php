<?php

class syringo_Container {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->services = new Hash();
	}}
	public $services;
	public function setObject($name, $object) {
		$service = _hx_anonymous(array("name" => $name, "cached" => true, "generator" => null, "object" => $object));
		$this->services->set($name, $service);
	}
	public function set($name, $generator) {
		$service = _hx_anonymous(array("name" => $name, "cached" => false, "generator" => $generator, "object" => null));
		$this->services->set($name, $service);
	}
	public function get($name) {
		$service = $this->services->get($name);
		$object = null;
		if($service->cached) {
			$object = $service->object;
		} else {
			$object = $service->generator($this);
			$service->object = $object;
			$service->cached = true;
		}
		return $object;
	}
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
	function __toString() { return 'syringo.Container'; }
}
