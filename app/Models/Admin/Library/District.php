<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['division_id', 'name', 'bn_name', 'lat', 'lon', 'url', 'status'];

    public static function selectMenu($division): array
    {
        return static::where('division_id', $division)->pluck('name', 'id')->prepend('Select District', '')->toArray();
    }

    public static function selectDistrict(): array
    {
        return static::pluck('name', 'id')->prepend('Select District', '')->toArray();
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}
