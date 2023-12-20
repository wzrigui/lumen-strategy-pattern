<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerNumber extends Model
{
    protected $fillable = ['number', 'broker_id', 'company_id'];

    public function broker()
    {
        return $this->belongsTo(Broker::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
