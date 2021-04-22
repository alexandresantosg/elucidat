<?php

namespace App;

/**
 * Decided to use Strategy Pattern to avoid having hardcoded items names
 * Class ItemService
 * @package App
 */
class ItemService
{
    const TYPE_CONJURED = "CONJURED";
    const TYPE_LEGENDARY = "LEGENDARY";
    const TYPE_PASS = "PASS";
    const TYPE_PROGRESSIVE = "PROGRESSIVE";
    const TYPE_REGULAR = "REGULAR";

    /** @var []  */
    private $itemList;

    public function __construct()
    {
        $this->itemList = (array)$this->getItemList();
    }

    private function getItemList() {
        return json_decode(file_get_contents('./src/items.json'));
    }

    public function getItemType(Item $item) {
        //Would use ?? operator but my PHP Storm for some reason wasn't recognizing the php version
        return empty($this->itemList[$item->name]) ? self::TYPE_REGULAR : $this->itemList[$item->name];
    }
}
