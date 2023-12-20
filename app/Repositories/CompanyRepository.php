<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function getCompanyNameById(int $companyId): string
    {
        $company = Company::find($companyId);

        if ($company) {
            return $company->name;
        }

        throw new \InvalidArgumentException('Invalid company ID');
    }
}
