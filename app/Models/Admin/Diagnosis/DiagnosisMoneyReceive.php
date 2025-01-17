<?php

namespace App\Models\Admin\Diagnosis;

use App\Models\Admin\Doctor\Reference;
use App\Models\Admin\Library\Agent;
use App\Models\Admin\Library\Gender;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiagnosisMoneyReceive extends Model
{
    use CreatedBy, SoftDeletes;

    protected $table = 'diag_money_receives';

    protected $fillable = [
        'patient_type',
        'patient_id',
        'patient_name',
        'gender_id',
        'dob',
        'mobile',
        'admission_id',
        'reservation_time',
        'reference_id',
        'reference_name',
        'is_self',
        'discount_is_percent',
        'discount_amount',
        'discount_in_bdt',
        'agent_id',
        'agent_name',
        'agent_commission_is_percent',
        'agent_commission',
        'agent_commission_in_bdt',
        'total_amount',
        'net_amount',
        'due_amount',
        'paid_amount',
        'status',
    ];

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function reference(): BelongsTo
    {
        return $this->belongsTo(Reference::class);
    }
}
