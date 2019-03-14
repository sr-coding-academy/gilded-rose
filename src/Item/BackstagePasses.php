<?php

namespace GildedRose\Item;
use GildedRose\Item;

class BackstagePasses extends Item
{
    function updateItemValuesUnique()
    {
        // TODO: Implement updateItemValuesUnique() method.
        if ($this->currentSellIn <= 10) {
            $this->quality = $this->quality + 2;
        } elseif ($this->currentSellIn <= 5) {
            $this->quality = $this->quality + 3;
        }
    }
}