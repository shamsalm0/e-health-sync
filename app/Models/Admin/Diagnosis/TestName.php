<?php

namespace App\Models\Admin\Diagnosis;

use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\HospitalRoom;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestName extends Model
{
    use CreatedBy;
    use SoftDeletes;

    public static function selectMenu(): array
    {
        return static::pluck('name', 'id')->prepend('Select test name', '')->toArray();
    }

    protected $fillable = ['test_group_id', 'name', 'cost', 'department_id', 'is_sample', 'lab_room_id', 'sample_room_id', 'delivery_time', 'report_type_id', 'is_level_print', 'is_ticket_show', 'is_discount', 'is_attribute_group', 'is_title_show', 'is_unit_show', 'is_normal_unit', 'is_normal_no_unit', 'is_dialysis', 'is_physiotherapy', 'is_test', 'free_amount', 'uom_id', 'comment', 'status'];

    public function testGroup(): BelongsTo
    {
        return $this->belongsTo(TestGroup::class, 'test_group_id')->select('id', 'name');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class)->select('id', 'name');
    }

    public function labRoom(): BelongsTo
    {
        return $this->belongsTo(HospitalRoom::class)->where('room_type_id', 1)->select('id', 'name');
    }
}
