<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select Gender', '')->toArray();
    }
}
