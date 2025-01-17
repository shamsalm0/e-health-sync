<?php

namespace App\Models\admin\Store;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'short_name', 'description', 'code', 'category_id', 'is_lab', 'type', 'parent_id', 'code', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select product', '')->toArray();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(StoreProductCategory::class, 'category_id')->select('id', 'name');
    }
}
