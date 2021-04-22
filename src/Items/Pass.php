<?php

namespace App\Items;

use App\Item;

/**
 * Decorated Items, Backstage passes, improves over time on a different rate
 * Class Pass
 * @package App
 */
class Pass extends Item
{
    public function __construct(Item $item)
    {
        $this->name = $item->name;
        $this->quality = $item->quality;
        $this->sellIn = $item->sellIn;
    }

    /**
     * Returns how fast the product improves or decays
     * @return int Amount of quality the product gains
     */
    private function changeRate() {
        //Will be zero after the concert date
        if ($this->sellIn <= 0) {
            return -$this->quality;
        }

        //Increases in even higher hate 5 days before
        if ($this->sellIn <= 5) {
            return 3;
        }

        //Increases in a higher rate 10 days before
        if ($this->sellIn <= 10) {
            return 2;
        }

        //Increases in normal rate way longer
        if ($this->sellIn > 10) {
            return 1;
        }
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
