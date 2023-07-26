<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_first_name', 'customer_last_name',
        'customer_primary_phone_number', 'customer_secondary_phone_number',
        'dob', 'gender', 'company_id'
    ];

    public function company () : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function customerjob(): HasMany
    {
        return $this->hasMany(CustomerJob::class);
    }

    public function customermeasurement (): HasMany
    {
        return $this->hasMany(CustomerMeasurement::class);
    }
}
