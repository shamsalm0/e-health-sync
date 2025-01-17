<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'phone', 'email', 'is_general', 'is_lab', 'is_store', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select department', '')->toArray();
    }
}
