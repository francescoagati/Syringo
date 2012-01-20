<?php

class Main {
	public function __construct(){}
	static function main() {
		$r = new haxe_unit_TestRunner();
		$r->add(new Test());
		$r->run();
	}
	function __toString() { return 'Main'; }
}
