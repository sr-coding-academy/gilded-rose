<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 14.03.2019
 * Time: 11:30
 */

namespace GildedRose\Customers;


use GildedRose\possessions\Ledge;

class Customer
{
    private $name;
    private $budget;
    private $inventory;
    private $currencies;
    private $ledge;

    public function __construct($name, $budget)
    {
        $this->name = $name;
        $this->budget = $budget;
        $this->inventory = [];
        $this->createFinances($budget);
    }

    private function createFinances()
    {
        $this->ledge = new Ledge();
        $this->ledge->setResources($this->name . "_gold", $this->name . "_silver");
        $this->currencies = $this->ledge->getPossessions();
        $this->currencies[0]->setAmount($this->budget[0]);
        $this->currencies[1]->setAmount($this->budget[1]);
    }

    public function getBudget()
    {
        return $this->budget;
    }

    public function setBudget($newBudget)
    {
        $this->budget = $newBudget;
        $this->currencies[0]->setAmount($this->budget[0]);
        $this->currencies[1]->setAmount($this->budget[1]);
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
        echo "Gold: " . $this->currencies[0]->getAmount() . "  |  ";
        echo "Silver: " .$this->currencies[1]->getAmount() . "\n";
    }
}