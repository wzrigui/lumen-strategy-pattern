<?php

namespace App\Strategies;

class WwkStrategy implements BrokerNumberNormalizationStrategy
{
    public function normalize(string $number): string
    {
        return substr(preg_replace('/^Q/', '', $number), 0, 8);
    }
}
