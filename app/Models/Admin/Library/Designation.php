<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'grade_id', 'description', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select designation', '')->toArray();
    }
}
