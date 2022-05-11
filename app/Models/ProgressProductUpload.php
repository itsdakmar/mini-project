<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $bus_id
 * @property string $file_name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class ProgressProductUpload extends Model
{
    const PENDING       = 0;
    const PROCESSING    = 1;
    const FAILED        = 2;
    const COMPLETED     = 3;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['bus_id', 'file_name', 'status', 'created_at', 'updated_at'];
}
