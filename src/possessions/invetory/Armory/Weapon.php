<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:42
 */

namespace GildedRose\possessions\invetory\Armory;
use GildedRose\possessions\invetory\Items;

class Weapon extends Items
{
    public function setQuality($quality)
    {
        if(($this->getExpiryDate() % 5) == 0){
            $this->quality = $this->getQuality() - 1;
        }
    }

    public function dailyUpdate()
    {
        $this->setQuality(1);
        $this->setExpiryDate($this->getExpiryDate() - 1);
    }
}