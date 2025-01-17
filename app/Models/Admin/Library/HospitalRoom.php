<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HospitalRoom extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['branch_id', 'building_id', 'room_type_id', 'name', 'room_no', 'phone', 'details', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select room', '')->toArray();
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(HospitalBranch::class, 'branch_id')->select('id', 'name');
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(HospitalBuilding::class, 'building_id')->select('id', 'name');
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class, 'room_type_id')->select('id', 'name');
    }
}
