<?php

namespace GildedRose\Item;

class Sulfuras extends Item
{
    private static $permanent;

    public function __construct($quality, $expirationDate)
    {
        parent::__construct($quality, $expirationDate);
        $this->name = "Sulfuras";
        self::$permanent = $quality;
    }

    function updateItemValuesUnique()
    {
        $this->quality = self::$permanent;
    }
}