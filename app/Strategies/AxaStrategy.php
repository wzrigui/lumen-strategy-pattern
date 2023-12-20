<?php

namespace App\Strategies;

class AxaStrategy implements BrokerNumberNormalizationStrategy
{
    public function normalize(string $number): string
    {
        return preg_replace('/^\d+\/|-|0+$/', '', $number);
    }

}
