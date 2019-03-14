<?php


namespace GildedRose;


abstract class Item
{
    protected $quality;
    protected $sellIn;
    protected $itemName;


    public function simulateDay()
    {
        $this->changeSellIn();
        $this->changeQuality();
        $this->limitQuality();
    }

    abstract protected function changeQuality();

    public function displayItem()
    {
        echo $this->itemName . "\n";
        echo 'Qualitätswert: ' . $this->quality . "\n";
        echo 'Zu verkaufen in ' . $this->sellIn . ' Tagen.';
    }

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