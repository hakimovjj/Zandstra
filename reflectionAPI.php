<?php
class CD {
    public $length = 50;
}

$prod = new ReflectionClass('CD');
Reflection::export($prod);
