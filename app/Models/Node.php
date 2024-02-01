<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Node extends Model
{
    use Uuidable;
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'name',
        'observation',
        'user_id',
    ];

    /** Relationships */

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    public function last_log(): HasMany
    {
        return $this->logs()->latest()->first();
    }

    /** Scopes */

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
