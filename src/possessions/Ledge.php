<?php
/**
 * Created by PhpStorm.
 * User: r.kallugjeri
 * Date: 14.03.2019
 * Time: 15:19
 */

namespace GildedRose\possessions;


use GildedRose\possessions\Finances\Gold;
use GildedRose\possessions\Finances\Silver;

class Ledge implements IPossession
{
    private $ledge;
    public function getPossessions()
    {
        $this->ledge = [];
        $this->ledge[] = new Gold();
        $this->ledge[] = new Silver();

        return $this->ledge;

    }

}