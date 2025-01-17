<?php

namespace App\Traits;

use App\Events\CreatedByEvent;
use App\Events\DeletedByEvent;
use App\Events\UpdatedByEvent;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait CreatedBy
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->select('id', 'name');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by')->select('id', 'name');
    }

    public static function bootCreatedBy(): void
    {
        static::creating(function ($model) {
            event(new CreatedByEvent($model));
        });

        static::updating(function ($model) {
            event(new UpdatedByEvent($model));
        });
        static::deleting(function ($model) {
            event(new DeletedByEvent($model));
        });
    }
}
