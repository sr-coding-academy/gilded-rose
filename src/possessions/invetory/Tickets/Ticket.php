<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:42
 */

namespace GildedRose\possessions\invetory\Ticket;
use GildedRose\possessions\invetory\Items;

class Ticket extends Items
{
    public function dailyUpdate()
    {
        $this->setExpiryDate($this->getExpiryDate() - 1);

        if($this->getExpiryDate() == 0) {
            $this->setQuality(0);
        } elseif($this->getExpiryDate() <= 5){
            $this->setQuality($this->getQuality() + 3 );
        } elseif($this->getExpiryDate() <= 10){
            $this->setQuality($this->getQuality() + 2 );
        }
        else{
            $this->setQuality(1);
        }
    }
}