<?php

namespace App\Items;

use App\Item;

/**
 * Decorated "Normal" item, which decays on a normal rate
 * Class Regular
 * @package App
 */
class Regular extends Item
{
    public function __construct(Item $item)
    {
        $this->name = $item->name;
        $this->quality = $item->quality;
        $this->sellIn = $item->sellIn;
    }

    /**
     * Returns how fast the product decays
     * @return int Amount of quality the product loses
     */
    private function changeRate() {
        return ($this->sellIn <= 0) ? -2 : -1;
    }

    /**
     * Updates the product quality and sellIn by 1 day
     */
    public function processNextDay() {
        //Update the quality of the product
        $this->quality = $this->quality > 1 ? $this->quality + $this->changeRate() : 0;

        //Ensures the item does not have a quality bigger than 50
        $this->quality = $this->quality > 50 ? 50 : $this->quality;

        //Update the sell in date
        $this->sellIn = $this->sellIn - 1;
    }
}
