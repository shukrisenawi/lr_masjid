<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'avatar_path',
        'head_of_family_name',
        'full_name',
        'nickname',
        'gender',
        'date_of_birth',
        'address',
        'village_id',
        'phone',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function committeeMemberships(): HasMany
    {
        return $this->hasMany(CommitteeMember::class);
    }

    public function communityGroups(): BelongsToMany
    {
        return $this->belongsToMany(CommunityGroup::class, 'community_group_member')
            ->withPivot('joined_at')
            ->withTimestamps();
    }

    public function paymentAssignments(): HasMany
    {
        return $this->hasMany(PaymentAssignment::class);
    }
}
