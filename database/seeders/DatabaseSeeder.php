<?php

namespace Database\Seeders;

use App\Models\Broker;
use App\Models\BrokerNumber;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();
        $company->name = 'Haftpflichtkasse Darmstadt';
        $company->save();

        $broker = new Broker();
        $broker->name = 'hdBroker';
        $broker->save();
        $brokerNumbers = [
            ['company_id' => $company->id, 'number' => '654564', 'broker_id' => $broker->id],
        ];
        BrokerNumber::insert($brokerNumbers);
    }
}
