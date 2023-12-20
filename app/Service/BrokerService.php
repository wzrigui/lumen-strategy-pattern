<?php

namespace App\Service;

use App\Models\Broker;
use App\Repositories\BrokerRepository;
use App\Repositories\CompanyRepository;

class BrokerService
{
    public function __construct(private BrokerRepository $brokerRepository,
                                private CompanyRepository $companyRepository,
                                private StrategySelector $strategySelector
    )
    {
    }

    public function findRelatedBroker(int $companyId, string $brokerNumber): ?Broker
    {
        $companyName = $this->companyRepository->getCompanyNameById($companyId);
        $strategy = $this->strategySelector->selectStrategy($companyName);;
        $normalizedNumber = $strategy->normalize($brokerNumber);

        return $this->brokerRepository->getMatchingBrokerNumbers($companyId, $normalizedNumber);
    }
}
