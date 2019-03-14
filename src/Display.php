<?php

namespace GildedRose;

class Display
{
    public function displayInventory(Shop $shop)
    {
        foreach ($shop->getInventory() as $item) {
            echo "\n\t{$item->name}\n";
            $tempOne = date("d-m-Y", $item->getPurchaseDate());
            echo "Purchase date: {$tempOne}\n";
            $tempTwo = date("d-m-Y", $item->getExpirationDate());
            echo "Expiration date: {$tempTwo}\n";
            echo "Quality: {$item->getQuality()}\n";
            if ($item->getCurrentSellIn() < 0) {
                $stayPositive = abs($item->getCurrentSellIn());
                echo "Days since expiration: {$stayPositive}\n";
            }
            else {
                echo "Days until expiration: {$item->getCurrentSellIn()}\n";
            }
            echo "---------------------------\n";
        }
    }

    public function displayInventoryAfter(Shop $shop, $days)
    {
        for ($i = 0; $i < $days-1; $i++) {
            $shop->updateInventory();
        }
        echo "\n______________________\n";
        echo "|After {$days} days:  |\n";
        echo "______________________\n";
        $this->displayInventory($shop);
    }
}