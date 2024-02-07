<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Node extends Model
{
    use Uuidable;
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'name',
        'observation',
        'hostname',
        'group_id',
    ];

    /** Relationships */

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class)->latest();
    }

    public function lastlog(): HasOne
    {
        return $this->hasOne(Log::class)->with('disks')->latest();
    }

    /** Scopes */
    public function scopePermitedAll($query)
    {
        /** @var User $user */
        $user = Auth::user();

        // Get IDS of Groups of User Auth
        $groupsIDS = $user->groups()->pluck('id')->toArray();

        return $query->whereIn('group_id', $groupsIDS)
            ->orderBy('name');
    }

    /** Attributes */
    protected function status(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value == 1,
            set: fn ($value) => ($value === 'true' || $value === true ? 1 : 0),
        );
    }

    /** Functions */
}
