<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * These are the valid user_type values.
     */
    const SUPER_ADMIN = 'super_admin';
    const STAFF = 'staff';

    /**
     * Include these computed attributes everytime.
     */
    protected $appends = ['full_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'birthdate',
        'pin',
        'email',
        'mobile_number',
        'password',
        'user_type',
        'address',
        'created_at',
        'update_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'pin',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Returns the full name of the user.
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        $name = $this->first_name;

        if (!empty($this->middle_name)) {
            $name .= ' ' . $this->middle_name;
        }

        if (!empty($this->last_name)) {
            $name .= ' ' . $this->last_name;
        }
        return $name;
    }
}
