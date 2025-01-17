<?php

namespace App\Models\Admin\Employee;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpFamily extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['emp_id', 'name', 'occupation_id', 'relation', 'nid', 'birth_certificate', 'mobile', 'photo', 'status'];
}
