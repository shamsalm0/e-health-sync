<?php

namespace App\Models\Admin\Employee;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpEducation extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['emp_id', 'exam_id', 'board_id', 'year', 'result', 'out_of', 'status'];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(EmpExam::class, 'exam_id')->select('id', 'name');
    }

    public function board(): BelongsTo
    {
        return $this->belongsTo(EmpBoard::class, 'board_id')->select('id', 'name');
    }
}
