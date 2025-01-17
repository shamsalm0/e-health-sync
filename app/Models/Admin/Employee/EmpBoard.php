<?php

namespace App\Models\Admin\Employee;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpBoard extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'is_board', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select Board', '')->toArray();
    }
}
