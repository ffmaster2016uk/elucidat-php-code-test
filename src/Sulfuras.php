<?php

    namespace App;

    use App\Interfaces\NextDayAble;

    class Sulfuras extends NormalItem implements NextDayAble
    {
        public static $qualityUpperLimit = 80;

        public function updateSellIn()
        {
            //sellIn day does not change, according to the tests
        }

        public function updateQuality()
        {
            $this->quality = self::$qualityUpperLimit;
        }
    }