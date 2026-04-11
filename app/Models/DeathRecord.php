<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class DeathRecord extends Model
{
    protected $fillable = [
        'image_path',
        'full_name',
        'nickname',
        'death_time',
        'place',
        'village_id',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'death_time' => 'datetime',
        ];
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
}
