<?php

class Test extends haxe_unit_TestCase {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public $container;
	public function checkObjectTest($object) {
		$this->assertEquals($object->title, "titolo", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 86, "className" => "Test", "methodName" => "checkObjectTest")));
		$this->assertEquals($object->user->name, "Mario", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 87, "className" => "Test", "methodName" => "checkObjectTest")));
		$this->assertEquals(_hx_len($object->collection), 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 88, "className" => "Test", "methodName" => "checkObjectTest")));
		$this->assertEquals($object->sum(1, 1), 2, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 89, "className" => "Test", "methodName" => "checkObjectTest")));
		$this->assertEquals($object->sum10(100), 110, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 90, "className" => "Test", "methodName" => "checkObjectTest")));
	}
	public function setup() {
		$this->container = new syringo_Container();
		$this->container->setObject("title", "titolo");
		$this->container->set("list", array(new _hx_lambda(array(), "Test_0"), 'execute'));
		$this->container->setObject("aNumber", 999);
		$this->container->set("person", array(new _hx_lambda(array(), "Test_1"), 'execute'));
		$this->container->set("sum", array(new _hx_lambda(array(), "Test_2"), 'execute'));
		$this->container->set("sum10", array(new _hx_lambda(array(), "Test_3"), 'execute'));
	}
	public function testContainerValues() {
		$this->assertEquals($this->container->get("title"), "titolo", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 132, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals(_hx_len($this->container->get("list")), 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 133, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals($this->container->get("person")->name, "Mario", _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 134, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals(call_user_func_array($this->container->get("sum"), array(1, 1)), 2, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 137, "className" => "Test", "methodName" => "testContainerValues")));
		$this->assertEquals(call_user_func_array($this->container->get("sum10"), array(100)), 110, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 140, "className" => "Test", "methodName" => "testContainerValues")));
	}
	public function testCheckCacheCallOnlyOne() {
		$list = $this->container->get("list");
		$this->assertEquals(_hx_len($this->container->get("list")), 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 148, "className" => "Test", "methodName" => "testCheckCacheCallOnlyOne")));
		$this->container->get("list")->push("ciao");
		$this->assertEquals(_hx_len($this->container->get("list")), 4, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 150, "className" => "Test", "methodName" => "testCheckCacheCallOnlyOne")));
	}
	public function testWithoutCache() {
		$list = $this->container->getWithoutCache("list");
		$this->assertEquals(_hx_len($this->container->getWithoutCache("list")), 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 156, "className" => "Test", "methodName" => "testWithoutCache")));
		$this->container->getWithoutCache("list")->push("ciao");
		$this->assertEquals(_hx_len($this->container->getWithoutCache("list")), 3, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 158, "className" => "Test", "methodName" => "testWithoutCache")));
	}
	public function testAnnotationValues() {
		$object = new TestClassAnnotations($this->container);
		$this->checkObjectTest($object);
	}
	public function testAnnotationPropertyValues() {
		$object = new TestPropertyAnnotation($this->container);
		$this->assertEquals($object->getX(), 999, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 169, "className" => "Test", "methodName" => "testAnnotationPropertyValues")));
	}
	public function testListValues() {
		$object = new TestClassList();
		syringo_Injector::injectByList($object, $this->container, new _hx_array(array(new _hx_array(array("title", "title")), new _hx_array(array("collection", "list")), new _hx_array(array("user", "person")), new _hx_array(array("sum", "sum")), new _hx_array(array("sum10", "sum10")))));
		$this->checkObjectTest($object);
	}
	public function testListPropertyValues() {
		$object = new TestPropertyList();
		syringo_Injector::injectByList($object, $this->container, new _hx_array(array(new _hx_array(array("my_x", "aNumber")))));
		$this->assertEquals($object->getX(), 999, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 193, "className" => "Test", "methodName" => "testListPropertyValues")));
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
		return array(new _hx_lambda(array(&$cont), "Test_4"), 'execute');
	}
}
function Test_3($cont) {
	{
		$accumulator = 10;
		return array(new _hx_lambda(array(&$accumulator, &$cont), "Test_5"), 'execute');
	}
}
function Test_4(&$cont, $a, $b) {
	{
		return $a + $b;
	}
}
function Test_5(&$accumulator, &$cont, $a) {
	{
		return $accumulator + $a;
	}
}
