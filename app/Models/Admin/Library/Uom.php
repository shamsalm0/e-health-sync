<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uom extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'details', 'type', 'status'];

    public static function selectMenu()
    {
        return static::where('status', 1)->pluck('name', 'id')->prepend('Select Uom', '');
    }
}
