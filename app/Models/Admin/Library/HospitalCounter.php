<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HospitalCounter extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['branch_id', 'building_id', 'floor_id', 'start_time', 'end_time', 'remarks', 'name', 'status'];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(HospitalBranch::class, 'branch_id')->select('id', 'name');
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(HospitalBuilding::class, 'building_id')->select('id', 'name');
    }

    public function floor(): BelongsTo
    {
        return $this->belongsTo(HospitalFloor::class, 'floor_id')->select('id', 'name');
    }
}
