<?php

    namespace App;

    use App\Interfaces\NextDayAble;

    class Brie extends NormalItem implements NextDayAble
    {
        public function getQualityChangeAmount() : int
        {
            return $this->sellIn < 0 ? 2 : 1;
        }

        public function checkQualityRange()
        {
            $this->checkQualityUpperLimit();
        }
    }