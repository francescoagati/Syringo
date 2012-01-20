<?php

class haxe_unit_TestRunner {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->result = new haxe_unit_TestResult();
		$this->cases = new HList();
	}}
	public $result;
	public $cases;
	public function add($c) {
		$this->cases->add($c);
	}
	public function run() {
		$this->result = new haxe_unit_TestResult();
		if(null == $this->cases) throw new HException('null iterable');
		$»it = $this->cases->iterator();
		while($»it->hasNext()) {
			$c = $»it->next();
			$this->runCase($c);
		}
		haxe_unit_TestRunner::hprint($this->result->toString());
		return $this->result->success;
	}
	public function runCase($t) {
		$old = haxe_Log::$trace;
		haxe_Log::$trace = (isset(haxe_unit_TestRunner::$customTrace) ? haxe_unit_TestRunner::$customTrace: array("haxe_unit_TestRunner", "customTrace"));
		$cl = Type::getClass($t);
		$fields = Type::getInstanceFields($cl);
		haxe_unit_TestRunner::hprint("Class: " . Type::getClassName($cl) . " ");
		{
			$_g = 0;
			while($_g < $fields->length) {
				$f = $fields[$_g];
				++$_g;
				$fname = $f;
				$field = Reflect::field($t, $f);
				if(StringTools::startsWith($fname, "test") && Reflect::isFunction($field)) {
					$t->currentTest = new haxe_unit_TestStatus();
					$t->currentTest->classname = Type::getClassName($cl);
					$t->currentTest->method = $fname;
					$t->setup();
					try {
						Reflect::callMethod($t, $field, new _hx_array(array()));
						if($t->currentTest->done) {
							$t->currentTest->success = true;
							haxe_unit_TestRunner::hprint(".");
						} else {
							$t->currentTest->success = false;
							$t->currentTest->error = "(warning) no assert";
							haxe_unit_TestRunner::hprint("W");
						}
					}catch(Exception $»e) {
						$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
						if(($e = $_ex_) instanceof haxe_unit_TestStatus){
							haxe_unit_TestRunner::hprint("F");
							$t->currentTest->backtrace = haxe_Stack::toString(haxe_Stack::exceptionStack());
						}
						else { $e2 = $_ex_;
						{
							haxe_unit_TestRunner::hprint("E");
							$t->currentTest->error = "exception thrown : " . $e2;
							$t->currentTest->backtrace = haxe_Stack::toString(haxe_Stack::exceptionStack());
						}}
					}
					$this->result->add($t->currentTest);
					$t->tearDown();
					unset($e2,$e);
				}
				unset($fname,$field,$f);
			}
		}
		haxe_unit_TestRunner::hprint("\x0A");
		haxe_Log::$trace = $old;
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
	static function hprint($v) { return call_user_func_array(self::$hprint, array($v)); }
	public static $hprint = null;
	static function customTrace($v, $p) {
		haxe_unit_TestRunner::hprint($p->fileName . ":" . $p->lineNumber . ": " . Std::string($v) . "\x0A");
	}
	function __toString() { return 'haxe.unit.TestRunner'; }
}
haxe_unit_TestRunner::$hprint = array(new _hx_lambda(array(), "haxe_unit_TestRunner_0"), 'execute');
function haxe_unit_TestRunner_0($v) {
	{
		php_Lib::hprint($v);
	}
}
