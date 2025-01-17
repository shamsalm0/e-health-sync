<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountServiceSetupCreateRequest;
use App\Models\Admin\Library\Department;
use App\Models\Admin\Library\DiscountServiceSetup;
use Illuminate\Http\Request;

class DiscountServiceSetupController extends Controller
{
    public function __construct()
    {
        $name = 'Discount Service Setup';
        $this->middleware("permission:$name View|$name Add|$name Edit|$name Delete", ['only' => ['index', 'show']]);
        $this->middleware("permission:$name Add", ['only' => ['create', 'store']]);
        $this->middleware("permission:$name Edit", ['only' => ['edit', 'update']]);
        $this->middleware("permission:$name Delete", ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data['discountServiceSetups'] = DiscountServiceSetup::paginate();

        return view('admin.library.discount-service-setup.index', $data);
    }

    public function create()
    {
        $data['discountServiceSetup'] = new DiscountServiceSetup;
        $data['departments'] = Department::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.library.discount-service-setup.create', $data);
    }

    public function store(DiscountServiceSetupCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['has_discount'] = $request->has('has_discount');
        $validated['has_commission'] = $request->has('has_commission');
        $validated['is_refundable'] = $request->has('is_refundable');
        $validated['in_others'] = $request->has('in_others');

        DiscountServiceSetup::create($validated);

        $alert = [
            'type' => 'success',
            'message' => 'Discount Service Setup created successfully.',
        ];

        return redirect()->route('discount-service-setup.index')
            ->with($alert);
    }

    public function show(DiscountServiceSetup $discountServiceSetup)
    {
        return view('admin.library.discount-service-setup.show', compact('discountServiceSetup'));
    }

    public function edit(DiscountServiceSetup $discountServiceSetup)
    {
        $data['discountServiceSetup'] = $discountServiceSetup;
        $data['departments'] = Department::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.library.discount-service-setup.edit', $data);
    }

    public function update(DiscountServiceSetupCreateRequest $request, DiscountServiceSetup $discountServiceSetup)
    {
        $validated = $request->validated();
        $validated['has_discount'] = $request->has('has_discount');
        $validated['has_commission'] = $request->has('has_commission');
        $validated['is_refundable'] = $request->has('is_refundable');
        $validated['in_others'] = $request->has('in_others');

        $discountServiceSetup->update($validated);

        $alert = [
            'type' => 'success',
            'message' => 'Discount Service Setup updated successfully.',
        ];

        return redirect()->route('discount-service-setup.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $discountServiceSetup = DiscountServiceSetup::findOrFail($id);
            $discountServiceSetup->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Discount Service Setup deleted successfully.',
            ];

            return redirect()->route('discount-service-setup.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('discount-service-setup.index')
                ->with($alert);
        }
    }
}
