<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 14.03.2019
 * Time: 15:21
 */

namespace GildedRose\possessions\Finances;


class Gold implements ICurrency
{

    public function setAmount($newamount)
    {
        $fileHandler = fopen('C:\workspace\GildedRose\gilded-rose\resources\gold.txt', 'w');
        fwrite($fileHandler, $newamount);
        fclose($fileHandler);
    }

    public function getAmount()
    {
        if ($fileHandler = fopen('C:\workspace\GildedRose\gilded-rose\resources\gold.txt', 'r+')) {
            while (!feof($fileHandler)) {
                $amount = fgets($fileHandler);
            }
            fclose($fileHandler);
        }
        return $amount;
    }
}