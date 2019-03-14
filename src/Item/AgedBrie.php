<?php

namespace GildedRose\Item;

use GildedRose\Item;

class AgedBrie extends Item
{
    private $qualityCounter;
    public function __construct($quality, $purchaseDate, $expirationDate)
    {
        parent::__construct($quality, $purchaseDate, $expirationDate);
        $this->qualityCounter = 0;
    }

    function updateItemValuesUnique()
    {
        if ($this->currentSellIn < 0) {
            $this->quality = $this->quality + (2 ** abs($this->currentSellIn)) + $this->qualityCounter;
            $this->qualityCounter++;
        }
        else {
            $this->quality = $this->quality + $this->qualityCounter;
            $this->qualityCounter++;
        }
    }
}