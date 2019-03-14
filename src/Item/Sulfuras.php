<?php

namespace GildedRose\Item;
use GildedRose\Item;

class Sulfuras extends Item
{
    private static $sulfurasQuality;

    public function __construct($quality, $expirationDate)
    {
        parent::__construct($quality, $expirationDate);
        $this->name = "Sulfuras";
        self::$sulfurasQuality = $quality;
    }

    function updateItemValuesUnique()
    {
        $this->quality = self::$sulfurasQuality;
    }
}