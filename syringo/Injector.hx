package syringo;

using Lambda; 
using haxe.rtti.Meta;
using Reflect;

class Injector {
  
  public static function injectByAnnotation(object:Dynamic,container:Container) {
    var cls:Class<Dynamic>=Type.getClass(object);
    var properties:Dynamic=cls.getFields();
  
    properties.fields().foreach(function(prop) {
      
      var annotation:Dynamic=properties.field(prop);
      
      if (annotation.hasField("inject")) {
        var field=annotation.inject[0];
        object.setField(prop, container.get(field));
      }
      
      return true;
    });
    
  }
  
  public static function injectByList(object:Dynamic,container:Container,injected:Array<Array<String>>) {
    for (el in injected) {
      object.setField(el[0],container.get(el[1]));
    }
    
  }
  
   
}