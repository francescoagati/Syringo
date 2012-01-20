<?php

class haxe_Stack {
	public function __construct(){}
	static function callStack() {
		return haxe_Stack::makeStack("%s");
	}
	static function exceptionStack() {
		return haxe_Stack::makeStack("%e");
	}
	static function toString($stack) {
		$b = new StringBuf();
		{
			$_g = 0;
			while($_g < $stack->length) {
				$s = $stack[$_g];
				++$_g;
				{
					$x = "\x0ACalled from ";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$b->b .= $x;
					unset($x);
				}
				haxe_Stack::itemToString($b, $s);
				unset($s);
			}
		}
		return $b->b;
	}
	static function itemToString($b, $s) {
		$�t = ($s);
		switch($�t->index) {
		case 0:
		{
			$x = "a C function";
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$b->b .= $x;
		}break;
		case 1:
		$m = $�t->params[0];
		{
			{
				$x = "module ";
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
			{
				$x = $m;
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
		}break;
		case 2:
		$line = $�t->params[2]; $file = $�t->params[1]; $s1 = $�t->params[0];
		{
			if($s1 !== null) {
				haxe_Stack::itemToString($b, $s1);
				{
					$x = " (";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$b->b .= $x;
				}
			}
			{
				$x = $file;
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
			{
				$x = " line ";
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
			{
				$x = $line;
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
			if($s1 !== null) {
				$x = ")";
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
		}break;
		case 3:
		$meth = $�t->params[1]; $cname = $�t->params[0];
		{
			{
				$x = $cname;
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
			{
				$x = ".";
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
			{
				$x = $meth;
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
		}break;
		case 4:
		$n = $�t->params[0];
		{
			{
				$x = "local function #";
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
			{
				$x = $n;
				if(is_null($x)) {
					$x = "null";
				} else {
					if(is_bool($x)) {
						$x = (($x) ? "true" : "false");
					}
				}
				$b->b .= $x;
			}
		}break;
		}
	}
	static function makeStack($s) {
		if(!isset($GLOBALS[$s])) {
			return new _hx_array(array());
		}
		$a = $GLOBALS[$s];
		$m = new _hx_array(array());
		{
			$_g1 = 0; $_g = $a->length - ((($s === "%s") ? 2 : 0));
			while($_g1 < $_g) {
				$i = $_g1++;
				$d = _hx_explode("::", $a[$i]);
				$m->unshift(haxe_StackItem::Method($d[0], $d[1]));
				unset($i,$d);
			}
		}
		return $m;
	}
	function __toString() { return 'haxe.Stack'; }
}
