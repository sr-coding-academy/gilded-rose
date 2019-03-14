<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:41
 */

namespace GildedRose\possessions\invetory\Consumables;
use GildedRose\possessions\invetory\Items;

abstract class Consumable extends Items
{

    public function dailyUpdate()
    {
        $this->setQuality( $this->getQuality() - 1);
        $this->setExpiryDate($this->getExpiryDate() - 1);
    }
}