<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class CommunityGroup extends Model
{
    protected $fillable = ['name', 'description'];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'community_group_member')
            ->withPivot('joined_at')
            ->withTimestamps();
    }
}
