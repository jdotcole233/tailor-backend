<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerMeasurement extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 'measurement_value'
    ];

    public function customer () : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
