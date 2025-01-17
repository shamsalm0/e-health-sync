<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upazila extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['district_id', 'name', 'bn_name', 'url', 'status'];

    public static function selectMenu($district): array
    {
        return static::where('district_id', $district)->pluck('name', 'id')->prepend('Select Upazila', '')->toArray();
    }

    public static function selectUpazila(): array
    {
        return static::pluck('name', 'id')->prepend('Select Upazila', '')->toArray();
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function unions(): HasMany
    {
        return $this->hasMany(Union::class);
    }
}
