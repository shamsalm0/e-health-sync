<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReferenceCreateRequest;
use App\Models\Admin\Doctor\Reference;
use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\District;
use App\Models\Admin\Library\HospitalBranch;
use App\Models\Admin\Library\Upazila;

class ReferenceController extends Controller
{
    public function __construct()
    {
        $name = 'Reference';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['references'] = Reference::paginate();

        return view('admin.employee.reference.index', $data);
    }

    public function create()
    {
        $data['reference'] = new Reference;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['departments'] = Department::selectMenu();
        $data['districts'] = District::selectDistrict();
        $data['upazilas'] = Upazila::selectUpazila();
        $data['statuses'] = $this->common_status;

        return view('admin.employee.reference.create', $data);
    }

    public function store(ReferenceCreateRequest $request)
    {
        $validated = $this->extracted($request);

        Reference::create($validated);

        $alert = [
            'type' => 'success',
            'message' => 'Reference created successfully.',
        ];

        return redirect()->route('reference.index')
            ->with($alert);
    }

    public function show(Reference $reference)
    {
        return view('admin.employee.reference.show', compact('reference'));
    }

    public function edit(Reference $reference)
    {
        $data['reference'] = $reference;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['departments'] = Department::selectMenu();
        $data['districts'] = District::selectDistrict();
        $data['upazilas'] = Upazila::selectUpazila();
        $data['statuses'] = $this->common_status;

        return view('admin.employee.reference.edit', $data);
    }

    public function update(ReferenceCreateRequest $request, Reference $reference)
    {
        $validated = $this->extracted($request);

        $reference->update($validated);

        $alert = [
            'type' => 'success',
            'message' => 'Reference updated successfully.',
        ];

        return redirect()->route('reference.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $reference = Reference::findOrFail($id);
            $reference->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Reference deleted successfully.',
            ];

            return redirect()->route('reference.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('reference.index')
                ->with($alert);
        }
    }

    public function extracted($request)
    {
        $validated = $request->validated();
        $validated['is_surgeon'] = $request->has('is_surgeon');
        $validated['is_anesthesia'] = $request->has('is_anesthesia');
        $validated['is_consultant'] = $request->has('is_consultant');
        $validated['is_ultrasonogram'] = $request->has('is_ultrasonogram');
        $validated['is_report_doctor'] = $request->has('is_report_doctor');

        return $validated;
    }
}
