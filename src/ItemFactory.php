<?php

namespace App;

/**
 * Generated Decorated Items based on their type, provided by items.json which could be a configurable file excluded
 * from GIT, so the code could work with newer items with no need to change anything.
 * Class ItemFactory
 * @package App
 */
class ItemFactory
{
    static public function getDecoratedItem(Item $item, ItemService $itemService) {
        $type = $itemService->getItemType($item);
        $className = "\\App\\Items\\$type";

        return new $className($item);
    }
}
