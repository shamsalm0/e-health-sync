<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'status'];
}
