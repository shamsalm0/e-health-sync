<?php

namespace App\Models\Admin\Diagnosis;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiagnosisTransaction extends Model
{
    use CreatedBy, SoftDeletes;

    protected $table = 'diag_transactions';

    protected $fillable = [
        'money_receive_id',
        'amount',
        'type',
        'counter_id',
        'status',
    ];
}
