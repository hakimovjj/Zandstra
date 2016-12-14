<?php
class Water {}
class Ocean extends Water {}
class Sea extends Water {}

class Earth {}
class Forest extends Earth {}
class Plains extends Earth {}

class Fire {}
class Sun extends Fire {}
class Lighter extends Fire {}

class Element {

    private $water;
    private $earth;
    private $fire;

    public function __construct(Water $water, Earth $earth, Fire $fire) {
        $this->water = $water;
        $this->earth = $earth;
        $this->fire = $fire;
    }

    public function getWater() {
        return clone $this->water;
    }

    public function getEarth() {
        return clone $this->earth;
    }

    public function getFire() {
        return clone $this->fire;
    }

}

$element = new Element(new Water(), new Earth(), new Fire());
print_r($element->getWater());
print_r($element->getEarth());
print_r($element->getFire());
