<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_first_name', 'owner_last_name',
        'owner_primary_phone_number', 'owner_secondary_phone_number',
        'company_id'
    ];

    public function company (): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user (): MorphOne
    {
         return $this->morphOne(User::class, 'clientable');
    }
}
