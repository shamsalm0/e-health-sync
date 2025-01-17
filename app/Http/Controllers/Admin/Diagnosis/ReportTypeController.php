<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Diagnosis\ReportTypeCreateRequest;
use App\Http\Requests\Diagnosis\ReportTypeUpdateRequest;
use App\Models\Admin\Diagnosis\ReportType;

class ReportTypeController extends Controller
{
    public function __construct()
    {
        $name = 'Report Type';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.diagnosis.report-type.index');
    }

    public function create()
    {
        $data['report_type'] = new ReportType;

        return view('admin.diagnosis.report-type.create', $data);
    }

    public function store(ReportTypeCreateRequest $request)
    {
        $validated = $request->validated();

        ReportType::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Report type created successfully',
        ];

        return redirect()->route('report-type.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['reportType'] = ReportType::findOrFail($id);

        return view('admin.diagnosis.report-type.show', $data);
    }

    public function edit(string $id)
    {
        $data['report_type'] = ReportType::findOrFail($id);

        return view('admin.diagnosis.report-type.edit', $data);
    }

    public function update(ReportTypeUpdateRequest $request, ReportType $report_type)
    {
        $validated = $request->validated();

        $report_type->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Report Type updated successfully',
        ];

        return redirect()->route('report-type.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
