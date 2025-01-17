<?php

namespace App\Models\admin\Store;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProductCategory extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'parent_id', 'code', 'status'];

    public static function selectCategory(): array
    {
        return static::where('parent_id', null)->pluck('name', 'id')->prepend('Select Category', '')->toArray();
    }

    public static function selectSubCategory(): array
    {
        return static::whereNot('parent_id', null)->pluck('name', 'id')->prepend('Select Sub Category', '')->toArray();
    }

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(StoreProductCategory::class, 'parent_id')->select('id', 'name');
    }
}
