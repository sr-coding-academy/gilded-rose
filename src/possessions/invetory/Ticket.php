<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:42
 */

namespace GildedRose\possessions\invetory;


class Ticket extends Items
{

    protected function dailyUpdate()
    {
        // TODO: Implement dailyUpdate() method.
        if($this->getExpiryDate() <= 5){
            $this->setQuality(3 );
        }
        elseif($this->getExpiryDate() <= 10){
            $this->setQuality(2 );
        }
        elseif($this->getExpiryDate() === 0){
            $this->setQuality( - $this->getQuality());
        }
    }
}