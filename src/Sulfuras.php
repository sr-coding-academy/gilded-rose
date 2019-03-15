<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 14.03.2019
 * Time: 08:53
 */

namespace GildedRose;


class Sulfuras extends Item
{

    protected function setPrice(){
        $this->price=24.99;
    }

    public function updateItem(){
        //Overwrites existing method, does nothing
    }
}