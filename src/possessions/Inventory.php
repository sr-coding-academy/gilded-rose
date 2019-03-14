<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 15:26
 */

namespace GildedRose\possessions;

use GildedRose\possessions\invetory\Armory\Longsword;
use GildedRose\possessions\invetory\Armory\Sulfuras;
use GildedRose\possessions\invetory\Consumables\AgedBrie;
use GildedRose\possessions\invetory\Consumables\ElkMeat;
use GildedRose\possessions\invetory\Consumables\RedWine;
use GildedRose\possessions\invetory\Tickets\BackstagePass;
use GildedRose\possessions\invetory\Tickets\Membership;

class Inventory implements IPossession
{
    private $myPossessions = [];

    public function __construct()
    {
        $this->addItem(AgedBrie::class,23, 10, "Aged Brie");
        $this->addItem(RedWine::class,20, 1000, "Red Wine");
        $this->addItem(ElkMeat::class,10, 7, "Elk Meat");
        $this->addItem(Sulfuras::class,50, "-", "Sulfuras");
        $this->addItem(Longsword::class,10, 12, "Long Sword");
        $this->addItem(BackstagePass::class,15, 8, "Backstage Pass");
        $this->addItem(Membership::class,35, 30, "Membership");
    }

    public function cleanInventory()
    {
        foreach($this->myPossessions as $item){
            if($item->getQuality() === 0){
                $key = array_search($item, $this->myPossessions);
                unset($this->myPossessions[$key]);
                $this->myPossessions = array_values($this->myPossessions);
            }
        }
    }

    public function sellItem($key){
        unset($this->myPossessions[$key]);
        $this->myPossessions = array_values($this->myPossessions);
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