<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;

class ReportDoctorCommissionController extends Controller
{
    public function __construct()
    {
        $name = 'Report Doctor Commission';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.doctor.report-doctor-commission.index');
    }
}
