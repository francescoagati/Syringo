<?php

class syringo_Injector {
	public function __construct(){}
	static function injectByAnnotation($object, $container) {
		$cls = Type::getClass($object);
		$properties = haxe_rtti_Meta::getFields($cls);
		Lambda::hforeach(Reflect::fields($properties), array(new _hx_lambda(array(&$cls, &$container, &$object, &$properties), "syringo_Injector_0"), 'execute'));
	}
	function __toString() { return 'syringo.Injector'; }
}
function syringo_Injector_0(&$cls, &$container, &$object, &$properties, $prop) {
	{
		$annotation = Reflect::field($properties, $prop);
		if(_hx_has_field($annotation, "inject")) {
			$field = $annotation->inject[0];
			$object->{$prop} = $container->get($field);
		}
		return true;
	}
}
