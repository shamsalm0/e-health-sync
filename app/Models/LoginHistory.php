<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginHistory extends Model
{
    protected $connection = 'mysql';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'username',
        'request_ip',
        'user_agent',
        'request_for',
        'user_agent',
        'remark',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
