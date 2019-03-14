<?php

namespace GildedRose;

class Display
{
    public function displayShop(Shop $shop)
    {
        foreach ($shop->getItems() as $item) {
            echo "---------------------------\n";
            echo "Name: {$item->name}\n";
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
        }
    }

    public function displayShopItemsAfter(Shop $shop, $days)
    {
        for ($i = 0; $i < $days-1; $i++) {
            $shop->updateAllItems();
        }
        echo "After {$days} days: \n";
        $this->displayShop($shop);
    }
}