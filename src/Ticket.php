<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 14.03.2019
 * Time: 08:33
 */

namespace GildedRose;


class Ticket extends Item
{

    protected function setPrice(){
        $this->price=49.99;
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
    protected function generateSellPrice()
    {
        if($this->sellIn<=0){
            $this->sellPrice=0.00;
        }else{
            $this->sellPrice = ($this->price * 2) / 100 * (100 + ($this->quality * 2));
        }
    }
}