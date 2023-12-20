<?php

namespace App\Strategies;

class HaftpflichtkasseStrategy implements BrokerNumberNormalizationStrategy
{
    public function normalize(string $number): string
    {
        return preg_replace('/[^0-9]+|^0+/', '', $number);
    }
}
