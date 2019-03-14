<?php

require "vendor/autoload.php";

use GildedRose\Shop;
use GildedRose\Brie;
use GildedRose\Tickets;
use GildedRose\Sulfuras;

$shop=new Shop();
$shop->buyItem($brie = new Brie(20));
$shop->buyItem(new Tickets(30));
$shop->buyItem(new Sulfuras(25));
$shop->simulateDay();
$shop->sellItem($brie);
$shop->displayStock();