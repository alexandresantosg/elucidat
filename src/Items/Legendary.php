<?php

namespace App\Items;

use App\Item;

/**
 * Decorated Item that never loses it's quality or have to be sold
 * Class Legendary
 * @package App
 */
class Legendary extends Item
{
    public function __construct(Item $item)
    {
        $this->name = $item->name;
        $this->quality = $item->quality;
        $this->sellIn = $item->sellIn;
    }

    /**
     * Returns how fast the product improves
     * @return int Amount of quality the product gains
     */
    private function changeRate() {
        //Legendary items never have to be sold
        return 0;
    }

    /**
     * Updates the product quality and sellIn by 1 day
     */
    public function processNextDay() {
        //Legendary items never have to be sold or change in quality
    }
}
