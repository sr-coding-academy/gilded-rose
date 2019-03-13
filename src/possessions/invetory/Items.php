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
    }

    public function getQuality()
    {

        return $this->quality;
    }

    public function setQuality($quality)
    {
        if($this->quality < 0){
            $this->quality = 0;
        }
        elseif ($this->quality > 50){
            $this->quality = 50;
        }
        else {
            $this->quality = $quality;
        }
    }

    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    public function setExpiryDate($expiryDate)
    {
        // TODO try catch, product expiry date cant be set in the past
        $this->expiryDate = $expiryDate;
    }

    protected abstract function dailyUpdate();
}