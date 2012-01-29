#Syringo

A dependeny injection for haxe inspired by [pimple](http://pimple.sensiolabs.org) and [syringe](https://github.com/leandrosilva/syringe).
Use lambda function for define dependency and annotations for inject it.



use annotation inject for define dependency

##Getting Started

###Define a class
```

class TestClassAnnotations {
  
  @inject("title")
  public var title:String;

  @inject("list")
  public var collection:Array<String>;
  
  @inject("person")
  public var user:Person;
  
  @inject("sum")
  public var sum:Float->Float->Float;

  @inject("sum10")
  public var sum10:Float->Float;
  
  public function new(container:syringo.Container) {
    syringo.Injector.injectByAnnotation(this,container);
  }
  
}

```

###Define an object container 

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
          
        //define a function in container
        container.set("sum",function(cont) {
          return function (a,b) {
            return a+b;
          };
        });
          
        //define a function with closure
        container.set("sum10",function(cont) {
          var accumulator:Int=10;
          return function(a) {
            return accumulator+a;
          };
        });
        

```


###And inject container

with annotation

```
  syringo.Injector.injectByAnnotation(this,container);
```

or by a list

```
  var object=new TestClassList();
      syringo.Injector.injectByList(object, container, [
        ['title','title'],
        ['collection','list'],
        ['user','person'],
        ['sum','sum'],
        ['sum10','sum10']
      ]);

```

see Test.hx for a full example
tested on php,js and neko