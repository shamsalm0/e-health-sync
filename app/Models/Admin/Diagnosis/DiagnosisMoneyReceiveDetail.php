<?php

namespace App\Models\Admin\Diagnosis;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiagnosisMoneyReceiveDetail extends Model
{
    use CreatedBy, SoftDeletes;

    protected $table = 'diag_money_receive_details';

    protected $fillable = [
        'money_receive_id',
        'test_id',
        'test_name',
        'price',
        'test_package_id',
        'is_discount',
        'ref_discount',
        'total_discount',
        'qty',
        'sub_total',
        'status',
    ];
}
