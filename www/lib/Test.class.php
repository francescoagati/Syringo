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
	}
	public function testContainerValues() {
		$this->assertEquals($this->container->get("title"), "titolo", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 49, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals(_hx_len($this->container->get("list")), 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 50, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals($this->container->get("person")->name, "Mario", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 51, "className" => "Test", "methodName" => "testContainerValues")));
	}
	public function testAnnotationValues() {
		$object = new TestClass($this->container);
		$this->assertEquals($object->title, "titolo", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 56, "className" => "Test", "methodName" => "testAnnotationValues")));
		$this->assertEquals($object->user->name, "Mario", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 57, "className" => "Test", "methodName" => "testAnnotationValues")));
		$this->assertEquals($object->collection->length, 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 58, "className" => "Test", "methodName" => "testAnnotationValues")));
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
