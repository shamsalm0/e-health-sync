<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Union extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['upazila_id', 'name', 'bn_name', 'url', 'status'];

    public static function selectMenu($upazila): array
    {
        return static::where('upazila_id', $upazila)->pluck('name', 'id')->prepend('Select Union', '')->toArray();
    }

    public function upazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class);
    }
}
