<?php

class syringo_Injector {
	public function __construct(){}
	static function injectByAnnotation($object, $container) {
		$cls = Type::getClass($object);
		$flds = haxe_rtti_Meta::getFields($cls);
		Lambda::hforeach(Reflect::fields($flds), array(new _hx_lambda(array(&$cls, &$container, &$flds, &$object), "syringo_Injector_0"), 'execute'));
	}
	function __toString() { return 'syringo.Injector'; }
}
function syringo_Injector_0(&$cls, &$container, &$flds, &$object, $prop) {
	{
		$obj = Reflect::field($flds, $prop);
		if(_hx_has_field($obj, "inject")) {
			$field = $obj->inject[0];
			$object->{$prop} = $container->get($field);
		}
		return true;
	}
}
