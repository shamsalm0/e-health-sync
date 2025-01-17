<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountServiceSetup extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['service_name', 'department_id', 'has_discount', 'has_commission', 'is_refundable', 'in_others', 'status'];

    public static function selectMenu(): array
    {
        return static::pluck('service_name', 'id')->prepend('Select Discount Service', '')->toArray();
    }

    public static function selectCommissionService(): array
    {
        return static::where('has_commission', 1)->pluck('service_name', 'id')->prepend('Select Service', '')->toArray();
    }

    public static function selectOtherServices(): array
    {
        return static::where('in_others', 1)->pluck('service_name', 'id')->prepend('Select Other Service', '')->toArray();
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
