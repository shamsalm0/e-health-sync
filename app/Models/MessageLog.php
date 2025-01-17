<?php

namespace App\Models;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageLog extends Model
{
    use CreatedBy;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'contact',
        'message_body',
        'response',
        'send_for',
        'updated_by',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
