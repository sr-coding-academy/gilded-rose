<?php

require "vendor/autoload.php";

use GildedRose\Brie;
use GildedRose\Tickets;
use GildedRose\Sulfuras;

$brie = new  Brie(0);
$brie->simulateDay();
$brie->displayItem();