<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:41
 */

namespace GildedRose\possessions\invetory;


abstract class Items
{
    protected $quality;
    protected $expiryDate;
    protected $itemName;

    public function __construct($quality, $expiryDate, $itemName)
    {
        $this->quality = $quality;
        $this->expiryDate = $expiryDate;
        $this->itemName = $itemName;
        echo "Creating item: " . $itemName . ", which expires in: " . $expiryDate . " days, with quality: " . $quality . ".\n";
    }

    public function getQuality()
    {
        return $this->quality;
    }

    protected function setQuality($quality)
    {
        if($this->quality <= 0){
            $this->quality = 0;
        }
        else if ($this->quality > 50){
            $this->quality = 50;
        }else{
            $this->quality = $quality;
        }

    }

    protected function getExpiryDate()
    {
        return $this->expiryDate;
    }

    protected function setExpiryDate($expiryDate)
    {
        if($this->getExpiryDate() <= 0) {
            $this->expiryDate = 0;
            $this->setQuality($this->getQuality() - 2);
        } else {
            $this->expiryDate = $expiryDate;
        }
    }
    public function getItemDescription()
    {
        echo "Satus --> " . $this->itemName . ", expires in: " . $this->expiryDate . " days, with quality: " . $this->quality . ".\n";
    }

    protected abstract function dailyUpdate();
}