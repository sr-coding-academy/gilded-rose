<?php

namespace GildedRose;

abstract class Item
{
    protected $quality;
    protected $purchaseDate;
    protected $expirationDate;
    protected $currentSellIn;
    protected $originalSellIn;

    public function __construct($quality, $purchaseDate, $expirationDate)
    {
        $this->quality = $quality;
        // TODO: resolve date problem
        $this->expirationDate = $expirationDate;
        $this->purchaseDate = $expirationDate;
        $this->currentSellIn = $expirationDate - $purchaseDate;
        $this->originalSellIn = $this->currentSellIn;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    public function getCurrentSellIn()
    {
        return $this->currentSellIn;
    }

    public function setCurrentSellIn($currentSellIn)
    {
        $this->currentSellIn = $currentSellIn;
    }


    public function updateItemValuesBeforeSellIn()
    {
        $this->currentSellIn--;
        $this->quality--;
    }

    public function updateItemValuesAfterSellIn()
    {
        $this->currentSellIn--;
        $this->quality = $this->quality - (2 ** abs($this->currentSellIn));
    }

    public function updateItemValues()
    {

    }

    abstract function updateItemValuesUnique();

    public function oneDayPasses()
    {
        if ($this->currentSellIn <= 0 && $this->quality < 50 && $this->quality > 0) {
            $this->updateItemValuesDefault();
            $this->updateItemValuesUnique();
        }

    }




}



/*
$rawToday = getdate();
$today = "{rawToday['year']}-{rawToday['month']}-{rawToday['day']}";
$date = new DateTime($today);
echo $date->format('Y-m-d');

$timestamp  = time();
echo $timestamp;
echo date("Y-m-d H:i:s", $timestamp);
*/