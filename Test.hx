typedef Person={
  name:String,
  surname:String
}

class TestClassList{
  
  public var title:String;
  public var collection:Array<String>;
  public var user:Person;
  public var sum:Float->Float->Float;
  public var sum10:Float->Float;
  
  public function new() {}
  
  
  
}

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

class Test extends haxe.unit.TestCase {
    
    var container: syringo.Container;

      override public function setup() {
          
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
        
          
      }
  
    public function testContainerValues(){
      assertEquals( container.get("title"), "titolo" );
      assertEquals( container.get("list").length, 3 );
      assertEquals( container.get("person").name, "Mario" );
      
      //inject a function and exec it
      assertEquals( container.get("sum")(1,1), 2);
      
      //inject a function with closure and exec it
      assertEquals( container.get("sum10")(100), 110);
            
    }
    
    
    public function testCheckCacheCallOnlyOne() {
      
      var list:Array<String>=container.get("list");
      assertEquals( container.get("list").length, 3 );
      container.get("list").push("ciao");
      assertEquals( container.get("list").length, 4 );
    }
    
    public function testWithoutCache() {
      
      var list:Array<String>=container.getWithoutCache("list");
      assertEquals( container.getWithoutCache("list").length, 3 );
      container.getWithoutCache("list").push("ciao");
      assertEquals( container.getWithoutCache("list").length, 3 );
    }
    
    public function testAnnotationValues() {
      var object=new TestClassAnnotations(container);
      
      assertEquals(object.title,"titolo");
      assertEquals(object.user.name,"Mario");
      assertEquals(object.collection.length,3);
      
      assertEquals(object.sum(1,1),2);
      assertEquals(object.sum10(100),110);
    }
    
    public function testListValues() {
      var object=new TestClassList();
      syringo.Injector.injectByList(object, container, [
        ['title','title'],
        ['collection','list'],
        ['user','person'],
        ['sum','sum'],
        ['sum10','sum10']
      ]);
      
      assertEquals(object.title,"titolo");
      assertEquals(object.user.name,"Mario");
      assertEquals(object.collection.length,3);
      assertEquals(object.sum(1,1),2);
      assertEquals(object.sum10(100),110);
     
    }
    
    
}
