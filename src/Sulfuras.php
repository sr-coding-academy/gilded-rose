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
    public function __construct($quality = 25)
    {
        $this->sellIn = 1000;
        $this->quality = $quality;
        $this->name = "Sulfuras";
        $this->price = 24.99;
        $this->generateSellPrice();
    }

    public function updateItem(){
        $this->generateSellPrice();
    }
}