<?php

class haxe_unit_TestCase implements haxe_Public{
	public function __construct() {
		;
	}
	public $currentTest;
	public function setup() {
	}
	public function tearDown() {
	}
	public function hprint($v) {
		haxe_unit_TestRunner::hprint($v);
	}
	public function assertTrue($b, $c) {
		$this->currentTest->done = true;
		if($b === false) {
			$this->currentTest->success = false;
			$this->currentTest->error = "expected true but was false";
			$this->currentTest->posInfos = $c;
			throw new HException($this->currentTest);
		}
	}
	public function assertFalse($b, $c) {
		$this->currentTest->done = true;
		if($b === true) {
			$this->currentTest->success = false;
			$this->currentTest->error = "expected false but was true";
			$this->currentTest->posInfos = $c;
			throw new HException($this->currentTest);
		}
	}
	public function assertEquals($expected, $actual, $c) {
		$this->currentTest->done = true;
		if($actual !== $expected) {
			$this->currentTest->success = false;
			$this->currentTest->error = "expected '" . $expected . "' but was '" . $actual . "'";
			$this->currentTest->posInfos = $c;
			throw new HException($this->currentTest);
		}
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
	function __toString() { return 'haxe.unit.TestCase'; }
}
