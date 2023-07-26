<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'address_street',
        'suburb', 'region', 'country', 
        'company_logo', 'social_media_handles',
        'primary_phone_number', 'secondary_phone_number'
    ];

    public function owners (): HasMany
    {
        return $this->hasMany(Owner::class, 'company_id');
    }

    public function customers (): HasMany
    {
        return $this->hasMany(Customer::class, 'company_id');
    }

    public function employees (): HasMany
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
