<?php

namespace App\Models\Admin\Doctor;

use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\District;
use App\Models\Admin\Library\HospitalBranch;
use App\Models\Admin\Library\Upazila;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reference extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['branch_id', 'name', 'mobile', 'phone', 'district_id', 'upazila_id', 'address', 'reference_type', 'qualification', 'department_id', 'is_surgeon', 'is_anesthesia', 'is_consultant', 'is_ultrasonogram', 'is_report_doctor', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select Doctor', '')->toArray();
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(HospitalBranch::class, 'branch_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function upazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class, 'upazila_id');
    }
}
