<?php

namespace App\Models\Admin\Employee;

use App\Models\Admin\Library\Bank;
use App\Models\Admin\Library\BankBranch;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpBankInfo extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['emp_id', 'bank_id', 'bank_branch_id', 'account_name', 'account_no', 'status'];

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id')->select('id', 'name');
    }

    public function bankBranch(): BelongsTo
    {
        return $this->belongsTo(BankBranch::class, 'bank_branch_id')->select('id', 'name');
    }
}
