<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $fillable = ['name', 'method', 'amount', 'description'];

    public function assignments(): HasMany
    {
        return $this->hasMany(PaymentAssignment::class);
    }
}
