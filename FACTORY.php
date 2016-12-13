<?php
abstract class Employ {
    protected $name;
    function __construct($name) {
        return $this->name = $name;
    }
    abstract function doing();
}

class Minion extends Employ {
    public function doing() {
        echo $this->name . ": убери со стола";
    }
}

class Boss {
    private $car = [];
    function addEmployee($name) {
        $this->car[] = new Minion($name);
    }
    function doing() {
        if (count($this->car) > 0);
            $emp = array_pop($this->car);
            $emp->doing();
    }
}

$ob = new Boss();
$ob->addEmployee('Nastya');
$ob->addEmployee('Алекс');

$ob->doing();
