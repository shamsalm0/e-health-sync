<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReligionCreateRequest;
use App\Models\Admin\Library\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    public function __construct()
    {
        $name = 'Religion';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index(Request $request)
    {
        $data['religions'] = Religion::paginate();

        return view('admin.religion.index', $data);
    }

    public function create()
    {
        $data['religion'] = new Religion;
        $data['statuses'] = $this->common_status;

        return view('admin.religion.create', $data);
    }

    public function store(ReligionCreateRequest $request)
    {
        Religion::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Religion created successfully.',
        ];

        return redirect()->route('religion.index')
            ->with($alert);
    }

    public function show(Religion $religion)
    {
        return view('admin.religion.show', compact('religion'));
    }

    public function edit(Religion $religion)
    {
        $data['religion'] = $religion;
        $data['statuses'] = $this->common_status;

        return view('admin.religion.edit', $data);
    }

    public function update(ReligionCreateRequest $request, Religion $religion)
    {
        $religion->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Religion updated successfully.',
        ];

        return redirect()->route('religion.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $religion = Religion::findOrFail($id);
            $religion->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Religion deleted successfully.',
            ];

            return redirect()->route('religion.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('religion.index')
                ->with($alert);
        }
    }
}
