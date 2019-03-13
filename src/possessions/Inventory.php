<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 15:26
 */

namespace GildedRose\possessions;

use GildedRose\possessions\invetory\Food;
use GildedRose\possessions\invetory\Ticket;
use GildedRose\possessions\invetory\Weapon;

class Inventory implements IPossession
{
    private $myPossessions = [];

    public function __construct()
    {
        $this->myPossessions[] = new Food(10, 14, "Aged Brie");
        $this->myPossessions[] = new Weapon(50, 1, "Sulfuras");
        $this->myPossessions[] = new Ticket(20, 3, "Backstage Passes");
    }

    public function getPossessions()
    {
        return $this->myPossessions;
    }

}