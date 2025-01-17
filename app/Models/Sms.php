<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Sms extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    public static $rules = [
        'title' => 'required',
        'body' => 'required',
        // 'status' => 'required',
    ];

    protected $perPage = 10;

    protected $fillable = ['title', 'body', 'status'];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->select('id', 'name');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by')->select('id', 'name');
    }

    protected $dispatchesEvents = [
        'creating' => \App\Events\CreatedByEvent::class,
        'updating' => \App\Events\UpdatedByEvent::class,
    ];
}
