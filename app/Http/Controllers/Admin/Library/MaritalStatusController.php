<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MaritalStatusCreateRequest;
use App\Models\MaritalStatus;
use Illuminate\Http\Request;

class MaritalStatusController extends Controller
{
    public function __construct()
    {
        $name = 'Marital Status';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index(Request $request)
    {
        $data['maritalStatuses'] = MaritalStatus::paginate();

        return view('admin.marital-status.index', $data);
    }

    public function create()
    {
        $data['maritalStatus'] = new MaritalStatus;
        $data['statuses'] = $this->common_status;

        return view('admin.marital-status.create', $data);
    }

    public function store(MaritalStatusCreateRequest $request)
    {
        MaritalStatus::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Marital Status created successfully.',
        ];

        return redirect()->route('marital-status.index')
            ->with($alert);
    }

    public function show(MaritalStatus $maritalStatus)
    {
        return view('admin.marital-status.show', compact('maritalStatus'));
    }

    public function edit(MaritalStatus $maritalStatus)
    {
        $data['statuses'] = $this->common_status;
        $data['maritalStatus'] = $maritalStatus;

        return view('admin.marital-status.edit', $data);
    }

    public function update(MaritalStatusCreateRequest $request, MaritalStatus $maritalStatus)
    {
        $maritalStatus->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Marital Status updated successfully.',
        ];

        return redirect()->route('marital-status.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $maritalStatus = MaritalStatus::findOrFail($id);
            $maritalStatus->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Marital Status deleted successfully.',
            ];

            return redirect()->route('marital-status.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('marital-status.index')
                ->with($alert);
        }
    }
}
