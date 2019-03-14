<?php

namespace GildedRose;

class Shop implements IShop
{
    private $inventory;

    public function __construct()
    {
        $this->inventory = [];
    }

    public function addItem($newItem)
    {
        $this->inventory[] = $newItem;
    }

    public function updateInventory()
    {
        foreach ($this->inventory as $item) {
            $item->oneDayPasses();
        }
    }

    public function getInventory()
    {
        return $this->inventory;
    }

    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
    }
}