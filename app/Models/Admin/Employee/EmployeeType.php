<?php

namespace App\Models\Admin\Employee;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeType extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $table = 'emp_types';

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select Type', '')->toArray();
    }

    protected $fillable = ['name', 'status'];
}
