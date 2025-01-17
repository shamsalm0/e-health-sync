<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HospitalCounterCreateRequest;
use App\Models\Admin\Library\HospitalBranch;
use App\Models\Admin\Library\HospitalBuilding;
use App\Models\Admin\Library\HospitalCounter;
use App\Models\Admin\Library\HospitalFloor;
use Illuminate\Http\Request;

class HospitalCounterController extends Controller
{
    public function __construct()
    {
        $name = 'Hospital Counter';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index(Request $request)
    {
        $data['hospitalCounters'] = HospitalCounter::paginate();

        return view('admin.hospital-counter.index', $data);
    }

    public function create()
    {
        $data['hospitalCounter'] = new HospitalCounter;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['buildings'] = HospitalBuilding::selectMenu();
        $data['floors'] = HospitalFloor::selectMenu();

        return view('admin.hospital-counter.create', $data);
    }

    public function store(HospitalCounterCreateRequest $request)
    {
        HospitalCounter::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Hospital Counter created successfully.',
        ];

        return redirect()->route('hospital-counter.index')
            ->with($alert);
    }

    public function show(HospitalCounter $hospitalCounter)
    {
        return view('admin.hospital-counter.show', compact('hospitalCounter'));
    }

    public function edit(HospitalCounter $hospitalCounter)
    {
        $data['hospitalCounter'] = $hospitalCounter;
        $data['branches'] = HospitalBranch::selectMenu();
        $data['buildings'] = HospitalBuilding::selectMenu();
        $data['floors'] = HospitalFloor::selectMenu();

        return view('admin.hospital-counter.edit', $data);
    }

    public function update(HospitalCounterCreateRequest $request, HospitalCounter $hospitalCounter)
    {
        $hospitalCounter->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Hospital Counter updated successfully.',
        ];

        return redirect()->route('hospital-counter.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $hospitalCounter = HospitalCounter::findOrFail($id);
            $hospitalCounter->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Hospital Counter deleted successfully.',
            ];

            return redirect()->route('hospital-counter.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('hospital-counter.index')
                ->with($alert);
        }
    }
}
