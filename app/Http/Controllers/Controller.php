<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $common_status = ['' => 'Select', '1' => 'Active', '0' => 'Inactive'];

    use AuthorizesRequests, ValidatesRequests;
}
