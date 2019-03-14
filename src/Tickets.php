<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 14.03.2019
 * Time: 08:33
 */

namespace GildedRose;


class Tickets extends Item
{
    public function __construct($sellIn, $quality = 25)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
        $this->name = "Backstage Pass";
    }

    protected function changeQuality()
    {
        if ($this->sellIn <= 0) {
            $this->quality = 0;
        } elseif ($this->sellIn <= 5) {
            $this->quality += 3;
        } elseif ($this->sellIn <= 10) {
            $this->quality += 2;
        } else {
            $this->quality++;
        }
    }
}