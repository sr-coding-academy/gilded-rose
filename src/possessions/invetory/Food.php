<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:41
 */

namespace GildedRose\possessions\invetory;


class Food extends Items
{

    public function dailyUpdate()
    {
        $this->setQuality( $this->getQuality() + 1);
        $this->setExpiryDate($this->getExpiryDate() - 1);
    }
}