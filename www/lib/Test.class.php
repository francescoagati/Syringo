<?php

class Test extends haxe_unit_TestCase {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public $container;
	public function setup() {
		$this->container = new syringo_Container();
		$this->container->setObject("title", "titolo");
		$this->container->set("list", array(new _hx_lambda(array(), "Test_0"), 'execute'));
		$this->container->set("person", array(new _hx_lambda(array(), "Test_1"), 'execute'));
		$this->container->set("sum", array(new _hx_lambda(array(), "Test_2"), 'execute'));
	}
	public function testContainerValues() {
		$this->assertEquals($this->container->get("title"), "titolo", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 60, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals(_hx_len($this->container->get("list")), 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 61, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals($this->container->get("person")->name, "Mario", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 62, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals(call_user_func_array($this->container->get("sum"), array(1, 1)), 2, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 65, "className" => "Test", "methodName" => "testContainerValues")));
	}
	public function testAnnotationValues() {
		$object = new TestClass($this->container);
		$this->assertEquals($object->title, "titolo", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 71, "className" => "Test", "methodName" => "testAnnotationValues")));
		$this->assertEquals($object->user->name, "Mario", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 72, "className" => "Test", "methodName" => "testAnnotationValues")));
		$this->assertEquals($object->collection->length, 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 73, "className" => "Test", "methodName" => "testAnnotationValues")));
		$this->assertEquals($object->sum(1, 1), 2, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 75, "className" => "Test", "methodName" => "testAnnotationValues")));
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
	function __toString() { return 'Test'; }
}
function Test_0($cont) {
	{
		$list = new _hx_array(array());
		$list->push($cont->get("title"));
		$list->push($cont->get("title"));
		$list->push($cont->get("title"));
		return $list;
	}
}
function Test_1($cont) {
	{
		return _hx_anonymous(array("name" => "Mario", "surname" => "Rossi"));
	}
}
function Test_2($cont) {
	{
		return array(new _hx_lambda(array(&$cont), "Test_3"), 'execute');
	}
}
function Test_3(&$cont, $a, $b) {
	{
		return $a + $b;
	}
}
