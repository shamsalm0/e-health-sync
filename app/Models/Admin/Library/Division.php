<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'bn_name', 'url', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select Division', '')->toArray();
    }
}
