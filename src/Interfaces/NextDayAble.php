<?php

    namespace App\Interfaces;

    interface NextDayAble
    {
        public function nextDay();

        public function updateSellIn();

        public function updateQuality();

        public function getQualityChangeAmount();

        public function checkQualityRange();

        public function checkQualityUpperLimit();

        public function checkQualityLowerLimit();

    }
