<?php

namespace App\Models\Admin\Employee;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;

class EmpWeekend extends Model
{
    use CreatedBy;

    protected $fillable = ['emp_id', 'day', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select Weekend', '')->toArray();
    }
}
