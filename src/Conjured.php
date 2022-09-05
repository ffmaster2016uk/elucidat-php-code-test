<?php

    namespace App;

    use App\Interfaces\NextDayAble;

    class Conjured extends NormalItem implements NextDayAble
    {
        public function getQualityChangeAmount() : int
        {
            return parent::getQualityChangeAmount() * 2;
        }
    }