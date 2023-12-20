<?php

namespace App\Service;

use App\Strategies\BrokerNumberNormalizationStrategy;
use App\Strategies\IdealStrategy;
use App\Strategies\AxaStrategy;
use App\Strategies\WwkStrategy;
use App\Strategies\BayerischeStrategy;
use App\Strategies\HaftpflichtkasseStrategy;
use App\Strategies\OtherInsuranceStrategy;

class StrategySelector
{
    public function selectStrategy(string $companyName): BrokerNumberNormalizationStrategy
    {
        switch ($companyName) {
            case 'Ideal Versicherung':
                return new IdealStrategy();
            case 'Axa Versicherung':
                return new AxaStrategy();
            case 'WWk':
                return new WwkStrategy();
            case 'die Bayerische':
                return new BayerischeStrategy();
            case 'Haftpflichtkasse Darmstadt':
                return new HaftpflichtkasseStrategy();

            default:
               return new OtherInsuranceStrategy();
        }
    }
}
