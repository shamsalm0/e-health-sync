<?php

namespace App\Models\Admin\Diagnosis;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiagnosisReportDoctorCommission extends Model
{
    use CreatedBy, SoftDeletes;

    protected $table = 'diag_report_doctor_commissions';

    protected $fillable = [
        'money_receive_id',
        'report_doctor_id',
        'commission',
        'status',
    ];
}
