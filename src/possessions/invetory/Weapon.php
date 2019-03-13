<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:42
 */

namespace GildedRose\possessions\invetory;


class Weapon extends Items
{
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = "-";
    }

    public function dailyUpdate()
    {
        $this->setExpiryDate("-");
    }
}