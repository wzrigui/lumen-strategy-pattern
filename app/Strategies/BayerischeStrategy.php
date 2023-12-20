<?php

namespace App\Strategies;

class BayerischeStrategy implements BrokerNumberNormalizationStrategy
{
    public function normalize(string $number): string
    {
        return preg_replace('/[^0-9]+/', '', $number);
    }

}
