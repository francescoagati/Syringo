package syringo;

typedef Service={
  name:String,
  cached:Bool,
  generator: Container->Dynamic,
  object:Dynamic
}