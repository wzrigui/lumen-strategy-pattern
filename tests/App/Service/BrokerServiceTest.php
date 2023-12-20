<?php

namespace Tests\App\Service;

use App\Models\Broker;
use App\Service\BrokerService;
use App\Repositories\BrokerRepository;
use PHPUnit\Framework\TestCase;

class BrokerServiceTest extends TestCase
{
    /**
     * @dataProvider brokerNumberProvider
     */
    public function testFindRelatedBroker($inputNumber, $normalizedNumber, $expectedBroker)
    {
        $brokerRepositoryMock = $this->createMock(BrokerRepository::class);
        $brokerService = new BrokerService($brokerRepositoryMock);
        $companyId = 1;

        $brokerRepositoryMock->expects($this->once())
            ->method('getMatchingBrokerNumbers')
            ->with($companyId, $normalizedNumber)
            ->willReturn($expectedBroker);

        $result = $brokerService->findRelatedBroker($companyId, $inputNumber);

        $this->assertSame($expectedBroker, $result);
    }

    public static function brokerNumberProvider(): array
    {
        return [
            ['23432', '23432', null],

            ['006674BA23', '6674BA23', new Broker()],
            ['6674BA23000', '6674BA23', new Broker()],
            ['6674-BA23', '6674BA23', new Broker()],

            ['Q412548787', '412548787', new Broker()],

            ['54501R784', '54501R784', new Broker()],
            ['54501-R784', '54501R784', new Broker()],
            ['54501784', '54501784', new Broker()],

            ['15154184714-000', '15154184714', new Broker()],
            ['99/15154184714', '15154184714', new Broker()],
        ];
    }
}

