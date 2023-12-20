<?php

namespace App\Strategies;

class IdealStrategy implements BrokerNumberNormalizationStrategy
{
    public function normalize(string $number): string
    {
        return preg_replace('/[^a-zA-Z0-9]+|^0+/', '', $number);
    }
}
