<?php

namespace App\Repositories;

use App\Models\BrokerNumber;
use App\Models\Broker;

class BrokerRepository
{
    public function getMatchingBrokerNumbers(int $companyId, string $normalizedNumber): ?Broker
    {
        $matchingBrokerNumber = BrokerNumber::where('company_id', $companyId)
            ->where('number', 'LIKE', "%{$normalizedNumber}%")
            ->first();

        return $matchingBrokerNumber ? $matchingBrokerNumber->broker : null;
    }
}
