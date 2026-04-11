<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['document_category_id', 'title', 'file_path', 'notes', 'uploaded_at'];

    protected function casts(): array
    {
        return [
            'uploaded_at' => 'date',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(DocumentCategory::class, 'document_category_id');
    }
}
