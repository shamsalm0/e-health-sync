<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenderCreateRequest;
use App\Models\Admin\Library\Gender;

class GenderController extends Controller
{
    public function __construct()
    {
        $name = 'Gender';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['genders'] = Gender::paginate();

        return view('admin.library.gender.index', $data);
    }

    public function create()
    {
        $data['gender'] = new Gender;
        $data['statuses'] = $this->common_status;

        return view('admin.library.gender.create', $data);
    }

    public function store(GenderCreateRequest $request)
    {
        Gender::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Gender created successfully.',
        ];

        return redirect()->route('gender.index')
            ->with($alert);
    }

    public function show(Gender $gender)
    {
        return view('admin.library.gender.show', compact('gender'));
    }

    public function edit(Gender $gender)
    {
        $data['statuses'] = $this->common_status;
        $data['gender'] = $gender;

        return view('admin.library.gender.edit', $data);
    }

    public function update(GenderCreateRequest $request, Gender $gender)
    {
        $gender->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Gender updated successfully.',
        ];

        return redirect()->route('gender.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $gender = Gender::findOrFail($id);
            $gender->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Gender deleted successfully.',
            ];

            return redirect()->route('gender.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('gender.index')
                ->with($alert);
        }
    }
}
