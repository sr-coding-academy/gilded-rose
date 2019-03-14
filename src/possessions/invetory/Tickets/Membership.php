<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 14.03.2019
 * Time: 09:28
 */

namespace GildedRose\possessions\invetory\Tickets;

class Membership extends Ticket
{
    public function dailyUpdate()
    {
        $this->setExpiryDate($this->getExpiryDate() - 1);

        if ($this->getExpiryDate() == 0) {
            $this->setQuality(0);
        }
    }
}