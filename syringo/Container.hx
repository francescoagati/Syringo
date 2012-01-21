package syringo;

class Container {
  
  var services:Hash<Service>;
  
  public function new() {
    services=new Hash();
  }
  
  public function setObject(name:String,object:Dynamic) {
    
    var service:Service={
      name:name,
      cached:true,
      generator:null,
      object:object
    };

    services.set(name, service);
    
  }
  
  public function set(name:String,generator:Container->Dynamic) {
    var service:Service={
      name:name,
      cached:false,
      generator:generator,
      object:null
    };

    services.set(name, service);
  }
  
  public function get(name:String):Dynamic {
    
    var service=services.get(name);
    var object:Dynamic;
    if (service.cached==false) {
      service.object=service.generator(this);
      service.cached=true;
    }
    
    return service.object;
    
  }
  
  public function getWithoutCache(name:String):Dynamic {
    return services.get(name).generator(this);
  }
  
}