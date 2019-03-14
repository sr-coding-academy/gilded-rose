<?php

require "vendor/autoload.php";

use GildedRose\Shop;
use GildedRose\Brie;
use GildedRose\Tickets;
use GildedRose\Sulfuras;

$shop=new Shop();
$shop->buyItem($brie = new Brie(20));
$shop->showMoney();
$shop->sellItem($brie);
$shop->showMoney();