<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Disk extends Model
{
    use HasFactory;
    use Uuidable;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'disk',
        'percent_usage',
        'usage',
        'total',
        'log_id',
    ];

    /** Relationships */
    public function log(): BelongsTo
    {
        return $this->belongsTo(Log::class);
    }

    /** Scopes */

    /** Attributes */

    /** Functions */
}
