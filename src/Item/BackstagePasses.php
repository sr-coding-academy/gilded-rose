<?php

namespace GildedRose\Item;

class BackstagePasses extends Item
{
    public function __construct($quality, $expirationDate)
    {
        parent::__construct($quality, $expirationDate);
        $this->name = "Backstage passes";
    }

    function updateItemValuesUnique()
    {
        if ($this->currentSellIn <= 10 && $this->currentSellIn > 5) {
            $this->quality = $this->quality + 2;
        }

        if ($this->currentSellIn <= 5 && $this->currentSellIn > 0) {
            $this->quality = $this->quality + 3;
        }

        if ($this->currentSellIn <= 0) {
            $this->quality = 0;
        }
    }
}