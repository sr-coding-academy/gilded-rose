<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 14.03.2019
 * Time: 09:22
 */

namespace GildedRose\possessions\invetory\Consumables;


class AgedBrie extends Consumable
{
    public function dailyUpdate()
    {
        if($this->getExpiryDate() > 0) {
            $this->setQuality($this->getQuality() + 1);
        }
        $this->setExpiryDate($this->getExpiryDate() - 1);
    }

}