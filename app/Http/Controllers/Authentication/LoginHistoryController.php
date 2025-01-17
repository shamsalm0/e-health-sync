<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;

class LoginHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Login History')->only('index');
    }

    public function index()
    {
        return view('authentication.login-history.index');
    }
}
