<?php

namespace App;

use App\ItemService;
use App\ItemFactory;
use App\Item;

class GildedRose
{
    /** @var Item[]  */
    private $items;

    /** @var ItemService  */
    private $itemService;


    public function __construct(array $items)
    {
        $this->items = $items;
        $this->itemService = new ItemService();
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as &$item) {
            $decoratedItem = ItemFactory::getDecoratedItem($item, $this->itemService);
            $decoratedItem->processNextDay();

            $item = $decoratedItem;
        }
    }
}
