<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HospitalBuilding extends Model
{
    use CreatedBy;
    use SoftDeletes;

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select Building', '')->toArray();
    }

    protected $fillable = ['branch_id', 'name', 'phone', 'email', 'address', 'status'];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(HospitalBranch::class, 'branch_id')->select('id', 'name');
    }
}
