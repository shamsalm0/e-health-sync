<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;

class MessageListController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Message Log')->only('index');
    }

    public function index()
    {
        return view('authentication.message-log.index');
    }
}
