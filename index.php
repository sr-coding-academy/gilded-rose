<?php

require "vendor/autoload.php";

use GildedRose\Shop;
use GildedRose\Brie;
use GildedRose\Ticket;
use GildedRose\Sulfuras;

$shop = new Shop();
$shop->buyItem($brie = new Brie(20));
$shop->simulateDay(2);
$shop->sellItem($brie);
$shop->showMoney();