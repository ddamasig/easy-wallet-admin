<?php

namespace App\Models;

class ReferralRequirement extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'is_enabled',
        'created_at',
        'update_at',
    ];
}
