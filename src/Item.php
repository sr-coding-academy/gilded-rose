<?php

namespace GildedRose;

abstract class Item
{
    public $name;
    protected $quality;
    protected $qualityOnExpirationDate;
    protected $purchaseDate;
    protected $expirationDate;
    protected $currentSellIn;
    protected $originalSellIn;

    public function __construct($quality, $expirationDate)
    {
        $this->name = "Default";
        $this->quality = $quality;
        $this->expirationDate = strtotime($expirationDate);
        $this->purchaseDate = time();
        $this->currentSellIn = abs(round(($this->purchaseDate - $this->expirationDate) / (60 * 60 * 24)));
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
        $this->quality = $this->qualityCheck($this->quality);
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
        } else {
            $this->updateItemValuesAfterSellIn();
        }
        $this->quality = $this->qualityCheck($this->quality);
    }

    protected function qualityCheck($anyQuality)
    {
        if ($anyQuality < 0) {
            $anyQuality = 0;
        }

        if ($anyQuality > 50) {
            $anyQuality = 50;
        }

        return $anyQuality;
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