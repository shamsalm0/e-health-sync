<?php

namespace App\Models\Admin\Diagnosis;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestMachine extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['test_name_id', 'machine_id', 'status'];

    public function testName(): BelongsTo
    {
        return $this->belongsTo(TestName::class);
    }

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
