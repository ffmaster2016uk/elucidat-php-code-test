<?php

    namespace App;

    use App\Interfaces\NextDayAble;

    class BackstagePasses extends NormalItem implements NextDayAble
    {
        public function getQualityChangeAmount() : int
        {
            return $this->sellIn < 5 ? 3 : ($this->sellIn < 10 ? 2 : 1);
        }

        public function checkQualityLowerLimit()
        {
            $this->quality = $this->sellIn < 0 ? 0 : $this->quality;
        }
    }