<?php

namespace GildedRose\Item;

use GildedRose\Item;

class AgedBrie extends Item
{

    function updateItemValuesUnique()
    {
        if ($this->currentSellIn == 0) {
            $this->quality++;
        } elseif ($this->currentSellIn > 0) {
            $this->quality = $this->quality + 2;
        }
    }
}