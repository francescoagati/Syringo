package syringo;

using Lambda; 
using haxe.rtti.Meta;
using Reflect;

class Injector {
  
  public static function injectByAnnotation(object:Dynamic,container:Container) {
    var cls:Class<Dynamic>=Type.getClass(object);
    var flds:Dynamic=cls.getFields();
    
  
    flds.fields().foreach(function(prop) {
      
      var obj:Dynamic=flds.field(prop);
      
      if (obj.hasField("inject")) {
        var field=obj.inject[0];
        object.setField(prop, container.get(field));
      }
      
      return true;
    });
    
  }
   
}