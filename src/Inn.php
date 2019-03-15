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
    private $myInventory;
    private $customerList;
    private $listOfItems;
    private $ledge;
    private $myCurrencies;

    public function __construct($name)
    {
        $this->name = $name;
        echo "Creating INN: " . $name;
        $this->loadInventory();
        $this->customerList = [];
        $this->loadFinances();
        $this->displayInnFinances();
        echo " \n\n";
    }

    private function loadInventory()
    {
        $this->myInventory = new Inventory();
    }

    private function loadFinances(){
        $this->ledge = new Ledge();
        $this->ledge->setResources("inn_gold", "inn_silver");
    }

    public function openShop()
    {
        echo "Opening shop for today \n";
        $this->listOfItems = $this->myInventory->getPossessions();
        foreach ($this->listOfItems as $item) {
            $item->dailyUpdate();
            $item->getItemDescription();
        }
        echo "\n";
    }

    public function addCustomer($customer)
    {
        $this->customerList[] = $customer;
        echo "Customer " .$customer->getName() . " just walked in." . "\n";
        $customer->displayFinances();
    }

    public function transaction($itemPosition,$customer)
    {
        $customerBudget = $customer->getBudget();
        echo "Customer " . $customer->getName() . " wants to buy item " . $this->listOfItems[$itemPosition]->getName() ."!\n";
        if($customerBudget[0] * 5 + $customerBudget[1] >= $this->listOfItems[$itemPosition]->getQuality()){
            $itemValue = $this->listOfItems[$itemPosition]->getQuality();
            if($itemValue <= $customerBudget[0]){
                $goldCoins = floor($itemValue, 5);
                $silverCoins = $goldCoins % 5;

                $customer->setBudget([$customerBudget[0] - $goldCoins, $customerBudget[1] + $silverCoins]);
                $this->myCurrencies[0]->setAmount($this->myCurrencies[0]->getAmount() + $goldCoins);
                $this->myCurrencies[1]->setAmount($this->myCurrencies[1]->getAmount() - $silverCoins);
            }
            else{
                $goldCoinsValue = $customerBudget[0] * 5;
                $silverCoins = $itemValue - $goldCoinsValue;

                $customer->setBudget([0, $customerBudget[1] - $silverCoins]);
                $this->myCurrencies[0]->setAmount($this->myCurrencies[0]->getAmount() + $customerBudget[0]);
                $this->myCurrencies[1]->setAmount($this->myCurrencies[1]->getAmount() + $silverCoins);
            }
            echo "Customer " . $customer->getName() . " successfully purchased item " . $this->listOfItems[$itemPosition]->getName() . "\n";
            $customer->getItemInInventory($this->listOfItems[$itemPosition]->getName());
            $this->myInventory->sellItem($itemPosition);

            $customer->displayFinances();
            $this->displayInnFinances();
        }
        else{
            echo "Not enough finances! Get out of my Inn you fucking hobo! \n";
        }
    }

    private function displayInnFinances(){
        $this->myCurrencies = $this->ledge->getPossessions();
        echo "Displaying Inn finances:   ";
        echo "Gold: " . $this->myCurrencies[0]->getAmount() ."  |  ";
        echo "Silver: " . $this->myCurrencies[1]->getAmount()."\n";
    }
}