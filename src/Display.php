<?php

namespace GildedRose;

class Display
{
    public function displayShop(Shop $shop)
    {
        foreach ($shop->getItems() as $item) {
            echo "Quality: {$item->getQuality()}";
            echo "Sellin: {$item->getSellin()}";
            echo "Quality: {$item->getQuality()}";
        }
    }
}