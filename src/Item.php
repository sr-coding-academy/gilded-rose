<?php


namespace GildedRose;


abstract class Item
{
    public $quality;
    public $sellIn;
    public $name;
    public $price;
    public $sellPrice;


    public function updateItem()
    {
        $this->changeSellIn();
        $this->changeQuality();
        $this->limitQuality();
        $this->generateSellPrice();
    }

    abstract protected function changeQuality();

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