<?php

namespace App\Models\Admin\Diagnosis;

use App\Models\admin\Store\StoreProduct;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestProduct extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['test_name_id', 'store_product_id', 'status'];

    public function testName(): BelongsTo
    {
        return $this->belongsTo(TestName::class);
    }

    public function storeProduct(): BelongsTo
    {
        return $this->belongsTo(StoreProduct::class);
    }
}
