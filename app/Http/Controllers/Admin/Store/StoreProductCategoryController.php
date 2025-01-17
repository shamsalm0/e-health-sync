<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreProductCategoryCreateRequest;
use App\Http\Requests\Store\StoreProductCategoryUpdateRequest;
use App\Models\Admin\Store\StoreProductCategory;

class StoreProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:Store Product Category View')->only('index', 'show');
        $this->middleware('can:Store Product Category Add')->only('create', 'store');
        $this->middleware('can:Store Product Category Edit')->only('edit', 'update');
        $this->middleware('can:Store Product Category Delete')->only('destroy');
    }

    public function index()
    {
        return view('admin.store.product-category.index');
    }

    public function create()
    {
        $data['productCategory'] = new StoreProductCategory;
        $data['parentCategories'] = StoreProductCategory::selectCategory();

        return view('admin.store.product-category.create', $data);
    }

    public function store(StoreProductCategoryCreateRequest $request)
    {
        $validated = $request->validated();
        StoreProductCategory::create($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Product Category created successfully',
        ];

        return redirect()->route('store.product-category.index')
            ->with($alert);
    }

    public function edit(string $id)
    {
        $data['productCategory'] = StoreProductCategory::findOrFail($id);
        $data['parentCategories'] = StoreProductCategory::selectCategory();

        return view('admin.store.product-category.edit', $data);
    }

    public function update(StoreProductCategoryUpdateRequest $request, string $id)
    {
        $validated = $request->validated();

        $productCategory = StoreProductCategory::findOrFail($id);
        $productCategory->update($validated);

        $alert = [
            'type' => 'Success',
            'message' => 'Product Category updated successfully',
        ];

        return redirect()->route('store.product-category.index')
            ->with($alert);
    }

    public function destroy(string $id) {}
}
