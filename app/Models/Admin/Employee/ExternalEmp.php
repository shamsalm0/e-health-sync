<?php

namespace App\Models\Admin\Employee;

use App\Models\admin\Employee\EmployeeType;
use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\Designation;
use App\Models\Admin\Library\HospitalBranch;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExternalEmp extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['branch_id', 'name', 'designation_id', 'department_id', 'emp_type_id', 'mobile', 'phone', 'external_type', 'qualification', 'address', 'remark', 'status'];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(HospitalBranch::class, 'branch_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function employeeType(): BelongsTo
    {
        return $this->belongsTo(EmployeeType::class, 'emp_type_id');
    }
}
