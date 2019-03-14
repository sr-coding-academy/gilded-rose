<?php

namespace GildedRose\Item;
use GildedRose\Item;

class Sulfuras extends Item
{
    private static $sulfurasQuality;

    public function __construct($quality, $purchaseDate, $expirationDate)
    {
        $this->name = "Sulfuras";
        parent::__construct($quality, $purchaseDate, $expirationDate);
        Sulfuras::$sulfurasQuality = $quality;
    }

    function updateItemValuesUnique()
    {

    }
}