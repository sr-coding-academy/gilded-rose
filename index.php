<?php

require "vendor/autoload.php";
use GildedRose\Inn;

    $myinn = new Inn("Gilded Rose\n");

    while(true){
        // Simulate a day in the real world
        $myinn->openShop();
        sleep(5);
    }
