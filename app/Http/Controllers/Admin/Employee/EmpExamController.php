<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmpExamCreateRequest;
use App\Models\EmpExam;

class EmpExamController extends Controller
{
    public function __construct()
    {
        $name = 'Employee Exam';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        $data['empExams'] = EmpExam::paginate();

        return view('admin.employee.emp-exam.index', $data);
    }

    public function create()
    {
        $data['empExam'] = new EmpExam;
        $data['statuses'] = $this->common_status;

        return view('admin.employee.emp-exam.create', $data);
    }

    public function store(EmpExamCreateRequest $request)
    {
        EmpExam::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Emp Exam created successfully.',
        ];

        return redirect()->route('emp-exam.index')
            ->with($alert);
    }

    public function show(EmpExam $empExam)
    {
        return view('admin.employee.emp-exam.show', compact('empExam'));
    }

    public function edit(EmpExam $empExam)
    {
        $data['statuses'] = $this->common_status;
        $data['empExam'] = $empExam;

        return view('admin.employee.emp-exam.edit', $data);
    }

    public function update(EmpExamCreateRequest $request, EmpExam $empExam)
    {
        $empExam->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Emp Exam updated successfully.',
        ];

        return redirect()->route('emp-exam.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $empExam = EmpExam::findOrFail($id);
            $empExam->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Emp Exam deleted successfully.',
            ];

            return redirect()->route('emp-exam.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('emp-exam.index')
                ->with($alert);
        }
    }
}
