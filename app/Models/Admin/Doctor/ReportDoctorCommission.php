<?php

namespace App\Models\Admin\Doctor;

use App\Models\Admin\Diagnosis\TestName;
use App\Models\Admin\Library\DiscountServiceSetup;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportDoctorCommission extends Model
{
    use CreatedBy, SoftDeletes;

    protected $fillable = ['report_doctor_id', 'service_id', 'test_name_id', 'commission_on', 'commission_type', 'commission', 'status'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(DiscountServiceSetup::class);
    }

    public function testName(): BelongsTo
    {
        return $this->belongsTo(TestName::class);
    }

    public function reportDoctor(): BelongsTo
    {
        return $this->belongsTo(Reference::class);
    }
}
