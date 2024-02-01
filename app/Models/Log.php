<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use Uuidable;
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = [
        'hostname',
        'cpu_usage',
        'cpu_total',
        'ram_usage',
        'ram_total',
        'disk_usage',
        'cpu_usage',
        'disk_total',
        'node_id',
    ];

    /** Relationships */

    public function node(): BelongsTo
    {
        return $this->belongsTo(Node::class);
    }

    /** Scopes */

    /** Attributes */

    /** Functions */
}
