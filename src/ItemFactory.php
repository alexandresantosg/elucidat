<?php

namespace App;
use App\Items\Legendary;
use App\Items\Pass;
use App\Items\Progressive;
use App\Items\Regular;
use App\Items\Conjured;

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

        switch($type) {
            case ItemService::TYPE_LEGENDARY:
                return new Legendary($item);
                break;
            case ItemService::TYPE_PASS:
                return new Pass($item);
                break;
            case ItemService::TYPE_PROGRESSIVE:
                return new Progressive($item);
                break;
            case ItemService::TYPE_CONJURED:
                return new Conjured($item);
                break;
            default:
                return new Regular($item);
                break;
        }
    }
}
