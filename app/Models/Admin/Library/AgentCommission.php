<?php

namespace App\Models\Admin\Library;

use App\Models\Admin\Diagnosis\TestName;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentCommission extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['agent_type', 'agent_id', 'test_id', 'is_percent', 'status'];

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function test(): BelongsTo
    {
        return $this->belongsTo(TestName::class);
    }
}
