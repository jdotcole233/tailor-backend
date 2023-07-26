<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 'job_type', 'start_date',
        'completion_date', 'quantity', 'customer_job_price',
        'unit_price', 'payment_status', 'mode_of_payment', 'extras'
    ];

    public function customer () : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
