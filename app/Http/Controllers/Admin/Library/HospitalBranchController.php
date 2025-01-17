<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Library\HospitalBranchCreateRequest;
use App\Http\Requests\Library\HospitalBranchUpdateRequest;
use App\Models\Admin\Library\HospitalBranch;

class HospitalBranchController extends Controller
{
    public function __construct()
    {
        $name = 'Hospital Branch';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.library.hospital-branch.index');
    }

    public function create()
    {
        $data['branch'] = new HospitalBranch;

        return view('admin.library.hospital-branch.create', $data);
    }

    public function store(HospitalBranchCreateRequest $request)
    {
        $validated = $request->validated();

        HospitalBranch::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Branch created successfully',
        ];

        return redirect()->route('hospital-branch.index')
            ->with($alert);
    }

    public function show(string $id)
    {
        $data['branch'] = HospitalBranch::findOrFail($id);

        return view('admin.library.hospital-branch.show', $data);
    }

    public function edit(string $id)
    {
        $data['branch'] = HospitalBranch::findOrFail($id);

        return view('admin.library.hospital-branch.edit', $data);
    }

    public function update(HospitalBranchUpdateRequest $request, string $id)
    {
        $request->validated();

        $branch = HospitalBranch::findOrFail($id);
        $branch->update($request->validated());

        $alert = [
            'type' => 'Success',
            'message' => 'Branch updated successfully',
        ];

        return redirect()->route('hospital-branch.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
