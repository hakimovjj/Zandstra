<?php
class Boss {

    const NEWS = 1;
    const OURS = 2;
    private $mode = 1;

    function __construct($mode) {
        $this->mode = $mode;
    }

    function getNewObj() {
        switch ($this->mode) {
            case (self::NEWS) :
                return new News();
            case (self::OURS) :
                return new OURS();
        }
    }

}

class News {
    function __construct() {
        echo __CLASS__;
    }
}

class OURS {
    function __construct() {
        echo __CLASS__;
    }
}

$boss = new Boss(1);
$boss->getNewObj();
