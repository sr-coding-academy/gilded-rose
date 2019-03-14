<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 14.03.2019
 * Time: 15:21
 */

namespace GildedRose\possessions\Finances;


interface ICurrency
{
    public function setAmount($newamount);
    public function getAmount();
}