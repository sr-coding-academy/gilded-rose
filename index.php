<?php

require "vendor/autoload.php";
use GildedRose\Inn;
use GildedRose\Customers\Customer;

    $myinn = new Inn("Gilded Rose\n");
    sleep(5);
    $customer_bob = new Customer("Bob",[5,10]);
    $myinn->openShop();
    $myinn->addCustomer($customer_bob);
    $myinn->transaction(3, $customer_bob);
    $customer_bob->showInventory();
    echo "\n\n";

    /*while(true){
        // Simulate a day in the real world
        $myinn->openShop();
        sleep(20);
    }*/
