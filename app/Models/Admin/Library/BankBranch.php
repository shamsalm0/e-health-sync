<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankBranch extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['bank_id', 'name', 'address', 'routing_no', 'status'];

    public static function selectMenu($bank_id)
    {
        return static::where('bank_id', $bank_id)
            ->pluck('name', 'id')
            ->prepend('Select Bank Branch', '');
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
