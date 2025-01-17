<?php

namespace App\Models\Admin\Employee;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpAddress extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['emp_id', 'c_division_id', 'c_district_id', 'c_upazila_id', 'c_post_office', 'c_post_code', 'c_address', 'c_mobile', 'p_division_id', 'p_district_id', 'p_upazila_id', 'p_post_office', 'p_post_code', 'p_address', 'p_mobile', 'mailing_address', 'status'];
}
