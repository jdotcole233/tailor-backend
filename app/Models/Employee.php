<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_first_name', 'employee_last_name',
        'employee_phone_number', 'company_id'
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
