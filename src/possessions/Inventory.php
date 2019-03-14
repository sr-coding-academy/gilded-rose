<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 15:26
 */

namespace GildedRose\possessions;

use GildedRose\possessions\invetory\Consumables\AgedBrie;
use GildedRose\possessions\invetory\Consumables\ElkMeat;
use GildedRose\possessions\invetory\Consumables\RedWine;

class Inventory implements IPossession
{
    private $myPossessions = [];

    public function __construct()
    {
        $this->addItem(AgedBrie::class,10, 3, "Aged Brie");
        $this->myPossessions[] = new RedWine(10, 1000, "Red Wine");
        $this->myPossessions[] = new ElkMeat(5, 7, "Elk Meat");
        //$this->myPossessions[] = new Weapon(50, 1, "Sulfuras");
        //$this->myPossessions[] = new Ticket(20, 3, "Backstage Passes");
    }

    public function cleanInventory()
    {
        foreach($this->myPossessions as $item){
            if($item->getQuality() == 0){
                $key = array_search($item, $this->myPossessions);
                unset($this->myPossessions[$key]);
                $this->myPossessions = array_values($this->myPossessions);
            }
        }
    }

    public function getPossessions()
    {
        $this->cleanInventory();
        return $this->myPossessions;
    }

    public function addItem($itemClass, $quality, $expiryDate, $name){
        $this->myPossessions[] = new $itemClass($quality, $expiryDate, $name);
    }
}