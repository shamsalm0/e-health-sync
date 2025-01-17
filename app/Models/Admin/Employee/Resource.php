<?php

namespace App\Models\Admin\Employee;

use App\Models\Admin\Library\District;
use App\Models\Admin\Library\Gender;
use App\Models\Admin\Library\HospitalBranch;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['branch_id', 'resource_type', 'name', 'father', 'mother', 'dob', 'personal_mobile', 'mobile', 'phone', 'email', 'nid', 'gender_id', 'c_district_id', 'c_upazila_id', 'c_address', 'p_district_id', 'p_upazila_id', 'p_address', 'blood_group_id', 'status'];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(HospitalBranch::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
