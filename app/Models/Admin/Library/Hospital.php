<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'mobile', 'phone', 'email', 'address', 'logo', 'banner', 'status'];
}
