<?php

namespace App\Strategies;

interface BrokerNumberNormalizationStrategy
{
    public function normalize(string $number): string;
}
