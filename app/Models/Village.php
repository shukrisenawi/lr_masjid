<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = ['name', 'description'];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function deathRecords(): HasMany
    {
        return $this->hasMany(DeathRecord::class);
    }
}
