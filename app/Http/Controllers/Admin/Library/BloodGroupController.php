<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BloodGroupCreateRequest;
use App\Models\Admin\Library\BloodGroup;

class BloodGroupController extends Controller
{
    public function __construct()
    {
        $name = 'Blood Group';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        $data['bloodGroups'] = BloodGroup::paginate();

        return view('admin.blood-group.index', $data);
    }

    public function create()
    {
        $data['bloodGroup'] = new BloodGroup;
        $data['statuses'] = $this->common_status;

        return view('admin.blood-group.create', $data);
    }

    public function store(BloodGroupCreateRequest $request)
    {
        BloodGroup::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Blood Group created successfully.',
        ];

        return redirect()->route('blood-group.index')
            ->with($alert);
    }

    public function show(BloodGroup $bloodGroup)
    {
        return view('admin.blood-group.show', compact('bloodGroup'));
    }

    public function edit(BloodGroup $bloodGroup)
    {
        $data['statuses'] = $this->common_status;
        $data['bloodGroup'] = $bloodGroup;

        return view('admin.blood-group.edit', $data);
    }

    public function update(BloodGroupCreateRequest $request, BloodGroup $bloodGroup)
    {
        $bloodGroup->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Blood Group updated successfully.',
        ];

        return redirect()->route('blood-group.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $bloodGroup = BloodGroup::findOrFail($id);
            $bloodGroup->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Blood Group deleted successfully.',
            ];

            return redirect()->route('blood-group.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('blood-group.index')
                ->with($alert);
        }
    }
}
