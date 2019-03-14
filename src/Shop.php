<?php
/**
 * Created by PhpStorm.
 * User: l.brunner
 * Date: 14.03.2019
 * Time: 10:14
 */

namespace GildedRose;


class Shop
{
    private $stock;
    private $bankBalance;

    public function __construct()
    {
        $this->bankBalance = 0.00;
    }

    public function buyItem(Item $item)
    {
        $this->stock[] = $item;
        $this->bankBalance -= $item->price;
    }

    public function sellItem(Item $item)
    {
        $this->bankBalance += $item->sellPrice;
        $key = array_search($item, $this->stock);
        unset($this->stock[$key]);
    }

    public function displayStock()
    {
        foreach ($this->stock as $item) {
            echo $item->name . "\n";
            echo 'Qualitätswert: ' . $item->quality . "\n";
            echo 'Zu verkaufen in ' . $item->sellIn . " Tagen.\n";
        }
    }

    public function simulateDay()
    {
        foreach ($this->stock as $item) {
            $item->updateItem();
        }
    }

    public function showMoney()
    {
        echo "Aktueller Kontostand: " . $this->bankBalance . "\n";
    }
}