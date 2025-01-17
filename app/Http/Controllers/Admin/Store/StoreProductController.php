<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreProductCreateRequest;
use App\Http\Requests\Store\StoreProductUpdateRequest;
use App\Models\Admin\Store\StoreProduct;
use App\Models\Admin\Store\StoreProductCategory;

class StoreProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Store Product View')->only('index', 'show');
        $this->middleware('can:Store Product Add')->only('create', 'store');
        $this->middleware('can:Store Product Edit')->only('edit', 'update');
        $this->middleware('can:Store Product Delete')->only('destroy');
    }

    public function index()
    {
        return view('admin.store.product.index');
    }

    public function create()
    {
        $data['product'] = new StoreProduct;
        $data['categories'] = StoreProductCategory::selectSubCategory();

        return view('admin.store.product.create', $data);
    }

    public function store(StoreProductCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['is_lab'] = $request->has('is_lab');
        StoreProduct::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Product created successfully',
        ];

        return redirect()->route('store.product.index')
            ->with($alert);
    }

    public function edit(string $id)
    {
        $data['product'] = StoreProduct::findOrFail($id);
        $data['categories'] = StoreProductCategory::selectSubCategory();

        return view('admin.store.product.edit', $data);
    }

    public function update(StoreProductUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $product = StoreProduct::findOrFail($id);
        $validated['is_lab'] = $request->has('is_lab');
        $product->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Product updated successfully',
        ];

        return redirect()->route('store.product.index')
            ->with($alert);
    }

    // public function destroy(string $id) {}
}
