<?php
class AbstractFactory {

    const getTtdEncoder = 1;
    const getContactEncoder = 2;
    const getApptEncoder = 3;
    private $mode = 1; //default mode

    function __construct($mode) {
        $this->mode = $mode;
    }

    function getNewObj() {
        switch ($this->mode) {
            case (self::getTtdEncoder) :
                return new getTtdEncoder();
            case (self::getContactEncoder) :
                return new getContactEncoder();
            case (self::getApptEncoder) :
                return new getApptEncoder();
        }
    }

}

class getTtdEncoder {
    function __construct() {
        echo __CLASS__;
    }
}

class getContactEncoder {
    function __construct() {
        echo __CLASS__;
    }
}

class getApptEncoder {
    function __construct() {
        echo __CLASS__;
    }
}
