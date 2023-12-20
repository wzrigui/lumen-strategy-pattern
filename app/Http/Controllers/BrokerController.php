<?php

namespace App\Http\Controllers;

use App\Service\BrokerService;
use Illuminate\Http\JsonResponse;

use Laravel\Lumen\Routing\Controller as BaseController;

class BrokerController extends BaseController
{
    public function __construct(private BrokerService $brokerService)
    {
    }

    public function getBrokerByCompanyAndNumber(int $companyId, string $brokerNumber): JsonResponse
    {
        try {
            $broker = $this->brokerService->findRelatedBroker($companyId, $brokerNumber);

            if ($broker === null) {
                return response()->json(['error' => 'Broker not found'], 404);
            }

            return response()->json($broker);
        } catch (\Exception) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}
