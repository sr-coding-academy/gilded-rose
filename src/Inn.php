<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:33
 */

namespace GildedRose;

use GildedRose\Customers\Customer;
use GildedRose\possessions\Inventory;
use GildedRose\possessions\Ledge;

class Inn
{
    private $name;
    private $myInvetory;
    private $customerList;
    private $listOfItems;
    private $ledge;
    private $myCurrencies;

    public function __construct($name)
    {
        $this->name = $name;
        echo "Creating INN: " . $name;
        $this->loadInventory();
        echo " \n\n";
        $this->customerList = [];
        $this->ledge = new Ledge();
    }

    private function loadInventory()
    {
        $this->myInvetory = new Inventory();
    }

    public function openShop()
    {
        echo "Opening shop for today \n";
        $this->listOfItems = $this->myInvetory->getPossessions();
        foreach ($this->listOfItems as $item) {
            $item->dailyUpdate();
            $item->getItemDescription();
        }
    }

    public function addCustomer($customer)
    {
        $this->customerList[] = $customer;
    }

    public function transaction($itemPosition,$customer)
    {
        $key = array_search($customer, $this->customerList);
        $customer = $this->customerList[$key];
        $customer->buyItem($this->listOfItems[$itemPosition]->getName());
        $this->myInvetory->sellItem($itemPosition);
        $this->displayFinances();
    }

    private function displayFinances(){
        $this->myCurrencies = $this->ledge->getPossessions();
        echo "Displaying Inn finances: \n";
        echo "Gold: " . $this->myCurrencies[0]->getAmount() ."\n";
        echo "Silver: " . $this->myCurrencies[1]->getAmount()."\n";
    }
}