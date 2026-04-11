<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    protected $fillable = ['payment_assignment_id', 'amount', 'paid_at', 'method', 'reference_no', 'notes'];

    protected function casts(): array
    {
        return [
            'paid_at' => 'date',
        ];
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(PaymentAssignment::class, 'payment_assignment_id');
    }
}
