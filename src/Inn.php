<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:33
 */

namespace GildedRose;


use GildedRose\possessions\Inventory;

class Inn
{
    private $name;
    private $myInvetory;

    public function __construct($name)
    {
        $this->name = $name;
        echo "Creating INN: " .$name;
        $this->loadInventory();
    }

    private function loadInventory(){
        $this->myInvetory = new Inventory();
    }

    public function openShop(){
        echo "Opening shop for today \n";
        $listOfItems = $this->myInvetory->getPossessions();
        foreach ($listOfItems as $item){
            $item->dailyUpdate();
            $item->getItemDescription();
        }
    }
}