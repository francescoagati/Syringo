<?php

class TestPropertyList {
	public function __construct() {
		;
	}
	public $x;
	public $my_x;
	public function getX() {
		return $this->my_x;
	}
	public function setX($v) {
		if($v >= 0) {
			$this->my_x = $v;
		}
		return $this->my_x;
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
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	function __toString() { return 'TestPropertyList'; }
}
TestPropertyList::$__meta__ = _hx_anonymous(array("fields" => _hx_anonymous(array("my_x" => _hx_anonymous(array("inject" => new _hx_array(array("aNumber"))))))));
