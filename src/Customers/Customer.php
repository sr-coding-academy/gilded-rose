<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 14.03.2019
 * Time: 11:30
 */

namespace GildedRose\Customers;


class Customer
{
    private $name;
    private $budget;
    private $inventory;

    public function __construct($name, $budget)
    {
        $this->name = $name;
        $this->budget = $budget;
        $this->inventory = [];
    }

    public function getBudget()
    {
        return $this->budget;
    }

    public function setBudget($newBudget)
    {
        $this->budget = $newBudget;
    }

    public function getItemInInventory($newItem)
    {
        $this->inventory[] = $newItem;
    }

    public function getName(){
        return $this->name;
    }

    public function showInventory()
    {
        echo "Displaying Inventory for: " . $this->name . "\n";
        foreach ($this->inventory as $item) {
            echo $item . "\n";
        }
    }
    public function displayFinances()
    {
        echo "Displaying " . $this->name . " finances:   ";
        echo "Gold: " . $this->getBudget()[0] . "  |  ";
        echo "Silver: " . $this->getBudget()[1]. "\n";
    }

}