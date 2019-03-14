<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 13.03.2019
 * Time: 14:26
 */

namespace GildedRose;


class Brie extends Item
{
    public function __construct($sellIn, $quality = 25)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
        $this->name = "Brie";
        $this->price=4.99;
        $this->generateSellPrice();
    }

    protected function changeQuality()
    {
        $this->quality++;
    }
}