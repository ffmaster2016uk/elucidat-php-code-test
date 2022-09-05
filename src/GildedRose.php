<?php

    namespace App;

    use App\Interfaces\NextDayAble;

    class GildedRose
    {
        private $items;

        public function __construct()
        {
            $this->items = [];
        }

        public function addItem(NextDayAble $item)
        {
            $this->items[] = $item;
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
            foreach ($this->items as $item) {
                $item->nextDay();
            }
        }
    }
