<?php
class Singleton {

    protected $property = [];

    private static $instance;

    private function __construct() {}

    public function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setProperty($key, $value) {
        $this->property[$key] = $value;
    }

    public function getProperty($key) {
        return $this->property[$key];
    }

}

$pre = Singleton::getInstance();
$pre->setProperty('name', "Иван");
unset($pre);
$pre2 = Singleton::getInstance();
echo $pre2->getProperty('name');
