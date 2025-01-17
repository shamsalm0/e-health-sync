<?php

namespace App\Models\Admin\Library;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketFee extends Model
{
    use CreatedBy;
    use SoftDeletes;

    protected $fillable = ['type', 'price', 'status'];
}
