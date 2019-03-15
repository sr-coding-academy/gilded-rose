<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 14.03.2019
 * Time: 15:21
 */

namespace GildedRose\possessions\Finances;


class Silver implements ICurrency
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function setAmount($newamount)
    {
        $fileHandler = fopen(__DIR__ . '\resources\\' . $this->fileName . '.txt', 'w');
        fwrite($fileHandler, $newamount);
        fclose($fileHandler);
    }

    public function getAmount()
    {
        if ($fileHandler = fopen(__DIR__ . '\resources\\' . $this->fileName . '.txt', 'r+')) {
            while (!feof($fileHandler)) {
                $amount = fgets($fileHandler);
            }
            fclose($fileHandler);
        }
        return $amount;
    }

}