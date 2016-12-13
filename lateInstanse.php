<?php
// abstract class Doc {
//     public static function create() {
//         return new static;
//     }
// }
//
// class NewDoc extends Doc{
//
// }
//
// var_dump(NewDoc::create());
abstract class DomainObject {
    private $group;
    public function __construct() {
        $this->group = static::getGroup();
    }
    public static function create() {
        return new static();
    }
    static function getGroup() {
        return "default";
    }
}

class User extends DomainObject {

}

class Document extends DomainObject {
    static function getGroup() {
        // static::getGroup();
        return "document";
    }
}

class Spread extends Document {
    static function getGroup() {
        // static::getGroup();
        return "Spread";
    }
}

print_r(User::create());

print_r(Spread::create());
