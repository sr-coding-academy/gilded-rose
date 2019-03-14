<?php

require "vendor/autoload.php";
use GildedRose\Item\AgedBrie;
use GildedRose\Shop;
use GildedRose\Display;

$gildedRose = new Shop();
$firstItem = new AgedBrie(1,3,15);
$gildedRose->addItem($firstItem);

$testDisplay = new Display();
$testDisplay->displayShop($gildedRose);






