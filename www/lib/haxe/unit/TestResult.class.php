<?php

class haxe_unit_TestResult {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->m_tests = new HList();
		$this->success = true;
	}}
	public $m_tests;
	public $success;
	public function add($t) {
		$this->m_tests->add($t);
		if(!$t->success) {
			$this->success = false;
		}
	}
	public function toString() {
		$buf = new StringBuf();
		$failures = 0;
		if(null == $this->m_tests) throw new HException('null iterable');
		$»it = $this->m_tests->iterator();
		while($»it->hasNext()) {
			$test = $»it->next();
			if($test->success === false) {
				{
					$x = "* ";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				{
					$x = $test->classname;
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				{
					$x = "::";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				{
					$x = $test->method;
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				{
					$x = "()";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				{
					$x = "\x0A";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				{
					$x = "ERR: ";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				if(_hx_field($test, "posInfos") !== null) {
					{
						$x = $test->posInfos->fileName;
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
					}
					{
						$x = ":";
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
					}
					{
						$x = $test->posInfos->lineNumber;
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
					}
					{
						$x = "(";
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
					}
					{
						$x = $test->posInfos->className;
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
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
						$buf->b .= $x;
						unset($x);
					}
					{
						$x = $test->posInfos->methodName;
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
					}
					{
						$x = ") - ";
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
					}
				}
				{
					$x = $test->error;
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				{
					$x = "\x0A";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				if($test->backtrace !== null) {
					{
						$x = $test->backtrace;
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
					}
					{
						$x = "\x0A";
						if(is_null($x)) {
							$x = "null";
						} else {
							if(is_bool($x)) {
								$x = (($x) ? "true" : "false");
							}
						}
						$buf->b .= $x;
						unset($x);
					}
				}
				{
					$x = "\x0A";
					if(is_null($x)) {
						$x = "null";
					} else {
						if(is_bool($x)) {
							$x = (($x) ? "true" : "false");
						}
					}
					$buf->b .= $x;
					unset($x);
				}
				$failures++;
			}
		}
		{
			$x = "\x0A";
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		if($failures === 0) {
			$x = "OK ";
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		} else {
			$x = "FAILED ";
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		{
			$x = $this->m_tests->length;
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		{
			$x = " tests, ";
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		{
			$x = $failures;
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		{
			$x = " failed, ";
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		{
			$x = $this->m_tests->length - $failures;
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		{
			$x = " success";
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		{
			$x = "\x0A";
			if(is_null($x)) {
				$x = "null";
			} else {
				if(is_bool($x)) {
					$x = (($x) ? "true" : "false");
				}
			}
			$buf->b .= $x;
		}
		return $buf->b;
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
	function __toString() { return $this->toString(); }
}
