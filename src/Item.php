<?php

namespace GildedRose;


abstract class Item
{
    private $quality;
    private $purchaseDate;
    private $expirationDate;
    private $sellIn;

    public function __construct($quality, $purchaseDate, $expirationDate)
    {
        $this->quality = $quality;
        // TODO: resolve date problem
        $this->expirationDate = $expirationDate;
        $this->purchaseDate = $expirationDate;
        $this->sellIn = $expirationDate - $purchaseDate;
    }


    protected function lowerQualityValue()
    {
        $this->quality--;
    }

    protected function lowerSellInValue()
    {
        $this->sellIn--;
    }
}

/*
$rawToday = getdate();
$today = "{rawToday['year']}-{rawToday['month']}-{rawToday['day']}";
$date = new DateTime($today);
echo $date->format('Y-m-d');
*/