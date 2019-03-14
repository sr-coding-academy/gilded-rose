<?php
/**
 * Created by PhpStorm.
 * User: r.quidet
 * Date: 14.03.2019
 * Time: 17:32
 */

namespace GildedRose;


interface IShop
{
    public function addItem($newItem);
    public function updateInventory();
    public function getInventory();
    public function setInventory($inventory);
}