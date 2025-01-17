<?php

namespace App\Models\Admin\Diagnosis;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestPackageDetail extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = [
        'package_id',
        'test_name_id',
        'price',
        'commission',
    ];

    public function testName(): BelongsTo
    {
        return $this->belongsTo(TestName::class);
    }
}
