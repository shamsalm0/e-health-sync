<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodGroup extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select blood group', '')->toArray();
    }
}
