<?php
abstract class ShopProductWriter {

    protected $products = [];

    public function addProduct(ShopProduct $shopProduct) {
        $this->products = array_values($shopProduct->product);
    }

    abstract function write();

}

class ShopProduct {

    public $product = ['Apple', "Orannge"];

}

interface Debug {
    public function debug($arr);
}

class CD extends ShopProductWriter implements Debug{

    public function debug($arr) {
        echo "<pre>".print_r($arr, true)."</pre>";
    }

    function write() {
        $this->debug($this->products);
    }

}

$shop = new ShopProduct();
$cd = new CD();
if ($cd instanceof Debug) {
    $cd->addProduct($shop);
}
$cd->write();
