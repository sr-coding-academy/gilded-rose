<?php

namespace GildedRose\Item;

abstract class Item
{
    public $name;
    protected $quality;
    protected $purchaseDate;
    protected $expirationDate;
    protected $currentSellIn;

    public function __construct($quality, $expirationDate)
    {
        $this->name = "Default";
        $this->quality = $quality;
        $this->expirationDate = strtotime($expirationDate);
        $this->purchaseDate = time();
        $this->currentSellIn = $this->calculateCurrentSellIn($this->purchaseDate, $this->expirationDate);
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function getCurrentSellIn()
    {
        return $this->currentSellIn;
    }

    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

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
        $this->quality = $this->limitQuality($this->quality);
    }

    private function calculateCurrentSellIn($purchaseDate, $expirationDate) {
        return abs(round(($purchaseDate - $expirationDate) / (60 * 60 * 24)));
    }

    private function limitQuality($quality)
    {
        if ($quality < 0) {
            $quality = 0;
        }

        if ($quality > 50) {
            $quality = 50;
        }

        return $quality;
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
        $this->quality = $this->limitQuality($this->quality);
    }

    abstract function updateItemValuesUnique();
}