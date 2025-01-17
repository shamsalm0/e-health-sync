<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['branch_id', 'name', 'from', 'to', 'status'];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(HospitalBranch::class, 'branch_id')->select('id', 'name');
    }
}
