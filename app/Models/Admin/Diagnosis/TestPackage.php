<?php

namespace App\Models\Admin\Diagnosis;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestPackage extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function testPackageDetails(): HasMany
    {
        return $this->hasMany(TestPackageDetail::class, 'package_id');
    }
}
