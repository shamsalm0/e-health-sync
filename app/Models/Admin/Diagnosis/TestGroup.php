<?php

namespace App\Models\Admin\Diagnosis;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestGroup extends Model
{
    use CreatedBy;
    use SoftDeletes;

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select Group', '')->toArray();
    }

    protected $fillable = ['name', 'description', 'is_roman', 'status'];
}
