<?php

require "vendor/autoload.php";

use GildedRose\Shop;
use GildedRose\Display;
use GildedRose\Item\AgedBrie;
use GildedRose\Item\Sulfuras;
use GildedRose\Item\BackstagePasses;

$gildedRose = new Shop();

$firstItem = new AgedBrie(20, "2019-03-20");
$secondItem = new Sulfuras(10, "2019-03-20");
$thirdItem = new BackstagePasses(1, "2019-03-25");

$gildedRose->addItem($firstItem);
$gildedRose->addItem($secondItem);
$gildedRose->addItem($thirdItem);

$simulation = new Display();
$simulation->displayInventory($gildedRose);
$simulation->displayInventoryAfter($gildedRose, 7);




