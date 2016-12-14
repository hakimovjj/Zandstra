<?php
class Config {
    public static $mod = 1;
}

abstract class AbstractFactory {
    public static function getFactory() {
        switch (Config::$mod) {
            case 1: return new FirstFactory;
            case 2: return new SecondFactory;
        }
    }
    abstract function getProduct();
}

interface Product {
    function getName();
}

class FirstFactory extends AbstractFactory {
    public function getProduct() {
        return new FirstProduct();
    }
}

class SecondFactory extends AbstractFactory {
    public function getProduct() {
        return new SecondProduct();
    }
}

class FirstProduct implements Product {
    public function getName() {
        echo "form 1 product";
    }
}

class SecondProduct implements Product {
    public function getName() {
        echo "form 2 product";
    }
}

$ob = AbstractFactory::getFactory()->getProduct();
Config::$mod = 2;
$ob = AbstractFactory::getFactory()->getProduct();
$ob->getName();
