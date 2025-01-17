<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OtherServiceCreateRequest;
use App\Models\Admin\Library\DiscountServiceSetup;
use App\Models\Admin\Library\OtherService;
use Illuminate\Http\Request;

class OtherServiceController extends Controller
{
    public function __construct()
    {
        $name = 'Other Service';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data['otherServices'] = OtherService::paginate();

        return view('admin.library.other-service.index', $data);
    }

    public function create()
    {
        $arr = ['' => 'Select', '0' => 'not include', '1' => 'include'];
        $data['otherService'] = new OtherService;
        $data['services'] = DiscountServiceSetup::selectOtherServices();
        $data['doctor_statuses'] = $arr;
        $data['nurse_statuses'] = $arr;
        $data['word_boy_statuses'] = $arr;
        $data['statuses'] = $this->common_status;

        return view('admin.library.other-service.create', $data);
    }

    public function store(OtherServiceCreateRequest $request)
    {
        OtherService::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Other Service created successfully.',
        ];

        return redirect()->route('other-service.index')
            ->with($alert);
    }

    public function show(OtherService $otherService)
    {
        return view('admin.library.other-service.show', compact('otherService'));
    }

    public function edit(OtherService $otherService)
    {
        $arr = ['' => 'Select', '0' => 'not include', '1' => 'include'];
        $data['services'] = DiscountServiceSetup::selectOtherServices();
        $data['otherService'] = $otherService;
        $data['doctor_statuses'] = $arr;
        $data['nurse_statuses'] = $arr;
        $data['word_boy_statuses'] = $arr;
        $data['statuses'] = $this->common_status;

        return view('admin.library.other-service.edit', $data);
    }

    public function update(OtherServiceCreateRequest $request, OtherService $otherService)
    {
        $otherService->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Other Service updated successfully.',
        ];

        return redirect()->route('other-service.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $otherService = OtherService::findOrFail($id);
            $otherService->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Other Service deleted successfully.',
            ];

            return redirect()->route('other-service.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('other-service.index')
                ->with($alert);
        }
    }
}
