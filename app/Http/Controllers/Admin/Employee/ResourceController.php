<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourceCreateRequest;
use App\Models\Admin\Employee\Resource;
use App\Models\Admin\Library\BloodGroup;
use App\Models\Admin\Library\Gender;
use App\Models\Admin\Library\HospitalBranch;

class ResourceController extends Controller
{
    public function __construct()
    {
        $name = 'Resource';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        $data['resources'] = Resource::paginate();

        return view('admin.resource.index', $data);
    }

    public function create()
    {
        $data['resource'] = new Resource;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['genders'] = Gender::selectMenu();
        $data['bloodGroups'] = BloodGroup::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.resource.create', $data);
    }

    public function store(ResourceCreateRequest $request)
    {
        Resource::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Resource created successfully.',
        ];

        return redirect()->route('resource.index')
            ->with($alert);
    }

    public function show(Resource $resource)
    {
        return view('admin.resource.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        $data['resource'] = $resource;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['genders'] = Gender::selectMenu();
        $data['bloodGroups'] = BloodGroup::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.resource.edit', $data);
    }

    public function update(ResourceCreateRequest $request, Resource $resource)
    {
        $validated = $request->validated();
        $data = $validated;
        $data['c_district_id'] = $data['district_id'];
        $data['c_upazila_id'] = $data['upazila_id'];
        $resource->update($data);

        $alert = [
            'type' => 'success',
            'message' => 'Resource updated successfully.',
        ];

        return redirect()->route('resource.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $resource = Resource::findOrFail($id);
            $resource->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Resource deleted successfully.',
            ];

            return redirect()->route('resource.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('resource.index')
                ->with($alert);
        }
    }
}
