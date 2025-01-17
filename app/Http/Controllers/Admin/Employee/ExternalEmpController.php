<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExternalEmpCreateRequest;
use App\Models\Admin\Employee\EmployeeType;
use App\Models\Admin\Employee\ExternalEmp;
use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\Designation;
use App\Models\Admin\Library\HospitalBranch;

class ExternalEmpController extends Controller
{
    public function __construct()
    {
        $name = 'External Emp';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        $data['externalEmps'] = ExternalEmp::paginate();

        return view('admin.employee.external-emp.index', $data);
    }

    public function create()
    {
        $data['externalEmp'] = new ExternalEmp;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['departments'] = Department::selectMenu();
        $data['designations'] = Designation::selectMenu();
        $data['empTypes'] = EmployeeType::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.employee.external-emp.create', $data);
    }

    public function store(ExternalEmpCreateRequest $request)
    {
        ExternalEmp::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'External Emp created successfully.',
        ];

        return redirect()->route('external-emp.index')
            ->with($alert);
    }

    public function show(ExternalEmp $externalEmp)
    {
        return view('admin.employee.external-emp.show', compact('externalEmp'));
    }

    public function edit(ExternalEmp $externalEmp)
    {
        $data['externalEmp'] = $externalEmp;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['departments'] = Department::selectMenu();
        $data['designations'] = Designation::selectMenu();
        $data['empTypes'] = EmployeeType::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.employee.external-emp.edit', $data);
    }

    public function update(ExternalEmpCreateRequest $request, ExternalEmp $externalEmp)
    {
        $externalEmp->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'External Emp updated successfully.',
        ];

        return redirect()->route('external-emp.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $externalEmp = ExternalEmp::findOrFail($id);
            $externalEmp->delete();

            $alert = [
                'type' => 'success',
                'message' => 'External Emp deleted successfully.',
            ];

            return redirect()->route('external-emp.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('external-emp.index')
                ->with($alert);
        }
    }
}
