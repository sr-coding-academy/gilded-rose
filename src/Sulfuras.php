<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 14.03.2019
 * Time: 08:53
 */

namespace GildedRose;


class Sulfuras extends Item
{
    public function __construct($sellIn, $quality = 25)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
        $this->itemName = "Sulfuras";
    }

    protected function changeQuality()
    {
        $this->quality=$this->quality;
    }

    protected function changeSellIn()
    {
        $this->sellIn=$this->sellIn;
    }
}