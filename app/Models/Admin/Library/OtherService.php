<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherService extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'service_id', 'description', 'doctor_status', 'nurse_status', 'word_boy_status', 'status'];

    public function discountServices(): BelongsTo
    {
        return $this->belongsTo(DiscountServiceSetup::class, 'service_id');
    }
}
