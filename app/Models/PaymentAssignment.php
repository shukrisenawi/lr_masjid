<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class PaymentAssignment extends Model
{
    protected $fillable = ['payment_type_id', 'member_id', 'assigned_at', 'status'];

    protected function casts(): array
    {
        return [
            'assigned_at' => 'date',
        ];
    }

    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(PaymentRecord::class);
    }
}
