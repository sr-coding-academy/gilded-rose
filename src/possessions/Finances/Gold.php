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

    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function setAmount($newamount)
    {
        $fileHandler = fopen(__DIR__ . '\resources\\' . $this->filename . '.txt', 'w');
        fwrite($fileHandler, $newamount);
        fclose($fileHandler);
    }

    public function getAmount()
    {
        if ($fileHandler = fopen( __DIR__ . '\resources\\' . $this->filename . '.txt', 'r+')) {
            while (!feof($fileHandler)) {
                $amount = fgets($fileHandler);
            }
            fclose($fileHandler);
        }
        return $amount;
    }
}