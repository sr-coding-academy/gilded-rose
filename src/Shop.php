<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 14.03.2019
 * Time: 10:14
 */

namespace GildedRose;


class Shop
{
    public $stock;

    public function buyItem(Item $item){
        $this->stock[] = $item;
    }

    public function displayStock(){
        foreach($this->stock as $item){
            echo $item->name."\n";
            echo 'Qualitätswert: ' . $item->quality . "\n";
            echo 'Zu verkaufen in ' . $item->sellIn . " Tagen.\n";
        }
    }

    public function simulateDay()
    {
        foreach($this->stock as $item){
            $item->updateItem();
        }
    }
}