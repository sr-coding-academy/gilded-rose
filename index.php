<?php

require "vendor/autoload.php";
use GildedRose\Inn;
use GildedRose\Customers\Customer;

    $myInn = new Inn("Gilded Rose\n");
    // Simulate day 1, Bob walks into the shop and wants to buy a weapon
    sleep(15);
    $customer_bob = new Customer("Bob",[5,50]);
    $myInn->openShop();
    $myInn->addCustomer($customer_bob);
    $myInn->transaction(3, $customer_bob);
    echo "\n\n";

    while(true){
        sleep(10);
        // Simulate a day in the real world
        $myInn->openShop();

    }
