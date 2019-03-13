<?php

require "vendor/autoload.php";

$newShop = new Shop();

$newItem = new Item();

$newShop->addItem($newItem);