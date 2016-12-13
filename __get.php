<?php
class Person {

    // private $name;
    //
    // function __set($prop, $val) {
    //     $method = "set$prop";
    //     if (method_exists($this, $method))
    //         return $this->$method($val);
    // }
    //
    // function setName($name) {
    //     $this->name = $name;
    //     $this->name = ucfirst($this->name);
    // }
    //
    // function getName() {
    //     echo $this->name;
    // }
    private $writer;

    function __construct(PersonWriter $writer) {
        $this->$writer = $writer;
    }

    function __call($method, $args) {
        if (method_exists($this->obj, $method)) {
            return call_user_func_array([$this->obj, $method], $args);
        }
    }

    function getName() {return "Ivan";}

}

class PersonWriter {

    function writeName(Person $p) {
        echo $p->getName() . "\n";
    }

}

$p = new Person( new PersonWriter() );
$person->writeName();
