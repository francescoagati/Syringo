<?php

class TestClass {
	public function __construct($container) {
		if(!php_Boot::$skip_constructor) {
		syringo_Injector::injectByAnnotation($this, $container);
	}}
	public $title;
	public $collection;
	public $user;
	public $summer;
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
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	function __toString() { return 'TestClass'; }
}
TestClass::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("title" => _hx_anonymous(array("inject" => new _hx_array(array("title")))), "collection" => _hx_anonymous(array("inject" => new _hx_array(array("list")))), "user" => _hx_anonymous(array("inject" => new _hx_array(array("person")))), "summer" => _hx_anonymous(array("inject" => new _hx_array(array("summer"))))))));
