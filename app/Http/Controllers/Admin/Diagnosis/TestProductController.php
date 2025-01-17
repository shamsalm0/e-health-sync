<?php

namespace App\Http\Controllers\Admin\Diagnosis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestProductCreateRequest;
use App\Models\Admin\Diagnosis\TestName;
use App\Models\Admin\Diagnosis\TestProduct;
use App\Models\admin\Store\StoreProduct;

class TestProductController extends Controller
{
    public function __construct()
    {
        $name = 'Test Product';
        $this->middleware("can:$name View")->only('index', 'show');
        $this->middleware("can:$name Add")->only('create', 'store');
        $this->middleware("can:$name Edit")->only('edit', 'update');
        $this->middleware("can:$name Delete")->only('destroy');
    }

    public function index()
    {
        return view('admin.test-product.index');
    }

    public function create()
    {
        $data['testProduct'] = new TestProduct;
        $data['testNames'] = TestName::selectMenu();
        $data['storeProducts'] = StoreProduct::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.test-product.create', $data);
    }

    public function store(TestProductCreateRequest $request)
    {
        TestProduct::create($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Test Product created successfully.',
        ];

        return redirect()->route('test-product.index')
            ->with($alert);
    }

    public function show(TestProduct $testProduct)
    {
        return view('admin.test-product.show', compact('testProduct'));
    }

    public function edit(TestProduct $testProduct)
    {
        $data['testProduct'] = $testProduct;
        $data['testNames'] = TestName::selectMenu();
        $data['storeProducts'] = StoreProduct::selectMenu();
        $data['statuses'] = $this->common_status;

        return view('admin.test-product.edit', $data);
    }

    public function update(TestProductCreateRequest $request, TestProduct $testProduct)
    {
        $testProduct->update($request->validated());

        $alert = [
            'type' => 'success',
            'message' => 'Test Product updated successfully.',
        ];

        return redirect()->route('test-product.index')
            ->with($alert);
    }

    public function destroy($id)
    {
        try {
            $testProduct = TestProduct::findOrFail($id);
            $testProduct->delete();

            $alert = [
                'type' => 'success',
                'message' => 'Test Product deleted successfully.',
            ];

            return redirect()->route('test-product.index')
                ->with($alert);
        } catch (\Exception $e) {
            $alert = [
                'type' => 'warning',
                'message' => $$e->getMessage(),
            ];

            return redirect()->route('test-product.index')
                ->with($alert);
        }
    }
}
