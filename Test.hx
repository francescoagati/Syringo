typedef Person={
  name:String,
  surname:String
}

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
          
      }
  
    public function testContainerValues(){
      assertEquals( container.get("title"), "titolo" );
      assertEquals( container.get("list").length, 3 );
      assertEquals( container.get("person").name, "Mario" );
    }
    
    public function testAnnotationValues() {
      var object=new TestClass(container);
      assertEquals(object.title,"titolo");
      assertEquals(object.user.name,"Mario");
      assertEquals(object.collection.length,3);
    }
    
}
