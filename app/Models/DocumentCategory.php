<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    protected $fillable = ['name', 'description'];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
