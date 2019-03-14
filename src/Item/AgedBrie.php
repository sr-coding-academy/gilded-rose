<?php

namespace GildedRose\Item;

use GildedRose\Item;

class AgedBrie extends Item
{
    private $qualityCounter;
    public function __construct($quality, $expirationDate)
    {
        parent::__construct($quality, $expirationDate);
        $this->name = "Aged Brie";
    }

    function updateItemValuesUnique()
    {
        if ($this->currentSellIn < 0) {
            $this->quality = $this->quality + ((2 ** abs($this->currentSellIn)+1));
        }
        else {
            $this->quality = $this->quality + 2;
            $this->qualityCounter++;
        }
    }
}