<?php

namespace GildedRose;

class Display
{
    /**
     * @param Shop $shop
     */
    public function displayShop(Shop $shop)
    {
        foreach ($shop->getItems() as $item) {
            echo "Name: {$item->name}";
            echo "Purchase date: {$item->getPurchaseDate()}";
            echo "Expiration date: {$item->getExpirationDate()}";
            echo "Quality: {$item->getQuality()}";
            // TODO: maybe Quantity
        }
    }

    public function displayShopItemsAfter(Shop $shop, int $days)
    {
        for ($i = 0; $i < $days; $i++) {
            $shop->updateAllItems();
        }
        $this->displayShop($shop);
    }
}