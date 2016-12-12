<?php
class SetProduct {

    public $discount = 0;
    public $title = 'Вид товара';
    public $productMainName = 'Фамилия автора';
    public $producerFirstName = 'Имя автора';
    private $price = 0;

    function __construct($title, $firstName, $mainName, $price) {
        $this->title = $title;
        $this->productMainName = $firstName;
        $this->producerFirstName = $mainName;
        $this->price =  $price;
    }

    function getProducer() {
        return "{$this->producerFirstName}" . "{$this->productMainName}";
    }

    function getSummaryLine() {
        $base = "{$this->title} ( {$this->productMainName}, ";
        $base .= "{$this->producerFirstName} )";
        return $base;
    }

    function getDiscount($num) {
        $this->discount = $num;
    }

    function setPrice($num) {
        return ($this->price - $this->discount);
    }

}

class ShopProductWriter {

    public $products = [];

    public function addProduct(SetProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    public function write() {
        $str = "";
        foreach ($this->products as $product) {
            $str .= "$product->title: ";
            $str .= $product->getProducerl();
            $str .= $product->getPrice();
        }
        echo $str;
    }

}

class CD extends SetProduct {

    public $playLength;

    function __construct($title, $firstName, $mainName, $price, $playLength) {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    function getPlayLength() {
        return $this->playLength;
    }

    function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= ": Время звучания - {$this->playLength}";
        echo $base;
    }

}

$cd = new CD("This Love", "Maroon", '5', 430, '430 sec');
echo $cd->getProducer();
