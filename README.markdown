A dependeny injection inspired by pimple and syringe.

Use lambda function for define dependency and annotations for inject it.


use annotation inject for define dependency

```

class TestClass {
  
  @inject("title")
  public var title:String;

  @inject("list")
  public var collection:Array<String>;
  
  @inject("person")
  public var user:Person;
  
  public function new(container:syringo.Container) {
    syringo.Injector.injectByAnnotation(this,container);
  }
  
}

```

define an object container 

```
        container=new syringo.Container();
        container.setObject("title", "titolo");
        container.set("list",function(cont) {
          var list=new Array();
          list.push(cont.get("title"));
          list.push(cont.get("title"));
          list.push(cont.get("title"));
          return list;
        });  
          
        container.set("person",function(cont):Person {
          return {
            name:"Mario",
            surname:"Rossi"
          }
        });
  

```


and inject container

`
  syringo.Injector.injectByAnnotation(this,container);
`


see Test.hx for a full example
tested on php,js and neko