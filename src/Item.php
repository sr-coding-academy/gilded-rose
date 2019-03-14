<?php


namespace GildedRose;


abstract class Item
{
    public $quality;
    public $sellIn;
    public $name;


    public function updateItem()
    {
        $this->changeSellIn();
        $this->changeQuality();
        $this->limitQuality();
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

    protected function changeSellIn(){
        $this->sellIn--;
    }
}