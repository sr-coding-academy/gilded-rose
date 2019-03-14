<?php

namespace GildedRose;

abstract class Item
{
    public $name;
    protected $quality;
    protected $purchaseDate;
    protected $expirationDate;
    protected $currentSellIn;
    protected $originalSellIn;

    public function __construct($quality, $purchaseDate, $expirationDate)
    {
        $this->name = "Default";
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

    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    private function updateItemValuesBeforeSellIn()
    {
        $this->currentSellIn--;
        $this->quality--;
    }

    private function updateItemValuesAfterSellIn()
    {
        $this->currentSellIn--;
        $this->quality = $this->quality - (2 ** abs($this->currentSellIn));
    }

    abstract function updateItemValuesUnique();

    public function oneDayPasses()
    {
        if ($this->quality > 0 && $this->quality <= 50) {
            if ($this->currentSellIn >= 0) {
                $this->updateItemValuesBeforeSellIn();
                $this->updateItemValuesUnique();
            } else {
                $this->updateItemValuesAfterSellIn();
                $this->updateItemValuesUnique();
            }
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