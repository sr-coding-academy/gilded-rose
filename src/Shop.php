<?php

namespace GildedRose;

use GildedRose\Item;


class Shop
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addItem($newItem)
    {
        $this->items[] = $newItem;
    }

    public function updateAllItems()
    {
        foreach ($this->items as $item) {
            $item->oneDayPasses();
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }


}