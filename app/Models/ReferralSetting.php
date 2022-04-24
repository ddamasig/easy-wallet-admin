<?php

namespace App\Models;

class ReferralSetting extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'duration',
        'is_transfer_enabled',
        'is_eloading_enabled',
        'is_ticketing_enabled',
        'is_bills_payment_enabled',
        'created_at',
        'update_at',
    ];
}
