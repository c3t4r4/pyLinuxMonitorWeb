<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Group extends Model
{
    use Uuidable;
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'observation',
        'user_id',
    ];

    /** Relationships */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function nodes(): HasMany
    {
        return $this->hasMany(Node::class)->with('lastlog');
    }

    public function active_nodes(): HasMany
    {
        return $this->nodes()->where('status', true);
    }

    /** Scopes */
    public function scopePermitedAll($query)
    {
        /** @var User $user */
        $user = Auth::user();

        return $query->whereUserId($user->id)
            ->orderBy('name');
    }

    /** Attributes */

    /** Functions */
}
