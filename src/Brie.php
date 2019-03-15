<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 13.03.2019
 * Time: 14:26
 */

namespace GildedRose;


class Brie extends Item
{

    protected function setPrice(){
        $this->price=4.99;
    }

    protected function changeQuality()
    {
        $this->quality++;
    }
}