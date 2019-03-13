<?php

namespace GildedRose;


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

}