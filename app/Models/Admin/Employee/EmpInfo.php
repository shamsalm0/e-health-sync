<?php

namespace App\Models\Admin\Employee;

use App\Models\Admin\Library\BloodGroup;
use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\Designation;
use App\Models\Admin\Library\Gender;
use App\Models\Admin\Library\MaritalStatus;
use App\Models\Admin\Library\Religion;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpInfo extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'father', 'mother', 'dob', 'gender_id', 'blood_group_id', 'marital_status_id', 'religion_id', 'nid', 'emp_id', 'emp_type_id', 'job_nature', 'department_id', 'designation_id', 'grade_id', 'joining_date', 'confirmation_date', 'driving_lisence_no', 'qualification', 'photo', 'status'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id')->select('id', 'name');
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class, 'designation_id')->select('id', 'name');
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class, 'gender_id')->select('id', 'name');
    }

    public function maritalStatus(): BelongsTo
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status_id')->select('id', 'name');
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'religion_id')->select('id', 'name');
    }

    public function bloodGroup(): BelongsTo
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group_id')->select('id', 'name');
    }

    public function employeeType(): BelongsTo
    {
        return $this->belongsTo(EmployeeType::class, 'emp_type_id')->select('id', 'name');
    }
}
