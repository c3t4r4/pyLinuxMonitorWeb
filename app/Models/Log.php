<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $node_id
 * @property mixed $id
 * @method static error(string $string)
 */
class Log extends Model
{
    use Uuidable;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'hostname',
        'cpu_usage',
        'cpu_total',
        'ram_usage',
        'ram_total',
        'cpu_usage',
        'node_id',
    ];

    /** Relationships */

    public function node(): BelongsTo
    {
        return $this->belongsTo(Node::class);
    }

    public function disks(): HasMany
    {
        return $this->hasMany(Disk::class);
    }

    /** Scopes */

    /** Attributes */
    public function setHostnameAttribute($value)
    {
        $this->attributes['hostname'] = $value;

        $node = Node::find($this->node_id);

        if(empty($node->hostname)){
            $node->hostname = $value;
            $node->save();
        }
    }



    /** Functions */
}
