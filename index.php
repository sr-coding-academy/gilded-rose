<?php

require "vendor/autoload.php";
use GildedRose\Item\AgedBrie;
use GildedRose\Shop;
use GildedRose\Display;
use GildedRose\Item\Sulfuras;

$gildedRose = new Shop();
$firstItem = new AgedBrie(20, "2019-03-20");
$secondItem = new Sulfuras(10, "2019-03-20");
$gildedRose->addItem($firstItem);
$gildedRose->addItem($secondItem);

$testDisplay = new Display();
$testDisplay->displayShop($gildedRose);
$testDisplay->displayShopItemsAfter($gildedRose, 5);




