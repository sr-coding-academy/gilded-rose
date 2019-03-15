<?php


namespace GildedRose;


abstract class Item
{
    protected $quality;
    protected $sellIn;
    protected $name;
    public $price;
    public $sellPrice;


    public function __construct($sellIn, $quality=25)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
        $this->setName(static::class);
        $this->setPrice();
        $this->generateSellPrice();
    }

    protected function setName($name){
        $this->name=$name;
    }

    abstract protected function setPrice();

    public function updateItem()
    {
        $this->changeSellIn();
        $this->changeQuality();
        $this->limitQuality();
        $this->generateSellPrice();
    }

    private function limitQuality()
    {
        if ($this->quality > 50) {
            $this->quality = 50;
        } elseif ($this->quality < 0) {
            $this->quality = 0;
        }
    }

    protected function changeSellIn()
    {
        $this->sellIn--;
    }

    protected function generateSellPrice()
    {
        $this->sellPrice = ($this->price * 2) / 100 * (100 + ($this->quality * 2));
    }
}