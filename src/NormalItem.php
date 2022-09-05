<?php

    namespace App;

    use App\Interfaces\NextDayAble;

    class NormalItem extends Item implements NextDayAble
    {
        public static $qualityUpperLimit = 50;

        /*
         * NormalItem constructor. Without being allowed to modified the item class, and the fact Guilded Rose Class
         * have to use the Item class (Not sure, maybe I've misread the requirement), there is very little can be done
         * to make sure the quality is not passed in as negative, the best thing to do is to change the properties to
         * protected, and do some sanitization before assigning, and then only allow modifying the property through
         * setter methods, accessing the property through getter methods
         *
         * Best I could do in this case is to sanitize the quality on constructor in this child class.
         *
         */

        public function __construct(string $name, int $quality, int $sellIn)
        {
            $quality = $quality >= 0 ? $quality : 0;

            parent::__construct($name, $quality, $sellIn);
        }

        public function nextDay()
        {
            $this->updateSellIn();
            $this->updateQuality();
        }

        public function updateSellIn()
        {
            $this->sellIn = $this->sellIn - 1;
        }

        public function updateQuality()
        {
            $changeAmount = $this->getQualityChangeAmount();
            $this->quality = $this->quality + $changeAmount;
            $this->checkQualityRange();
        }

        public function getQualityChangeAmount() : int
        {
            return $this->sellIn < 0 ? -2 : -1;
        }

        public function checkQualityRange()
        {
            $this->checkQualityUpperLimit();
            $this->checkQualityLowerLimit();
        }

        public function checkQualityUpperLimit()
        {
            $this->quality = $this->quality > self::$qualityUpperLimit ? self::$qualityUpperLimit : $this->quality;
        }

        public function checkQualityLowerLimit()
        {
            $this->quality = $this->quality < 0 ? 0 : $this->quality;
        }
    }