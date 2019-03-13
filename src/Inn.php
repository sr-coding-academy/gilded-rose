<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 13.03.2019
 * Time: 14:33
 */

namespace GildedRose;


class Inn
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        echo "Creating INN: " .$name;
    }



}