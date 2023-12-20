<?php

namespace App\Strategies;

class OtherInsuranceStrategy implements BrokerNumberNormalizationStrategy
{
    public function normalize(string $number): string
    {
        return $number;
    }

}
