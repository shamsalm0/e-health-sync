<div class="card">
    <div class="card-body">
        <x-row>
            <x-form.select :options="$testNames" :selected="$testProduct?->test_name_id" name="test_name_id" label="Select Test" />
            <x-form.select :options="$storeProducts" :selected="$testProduct?->store_product_id" name="store_product_id" label="Select Product" />
            <x-form.select :options="$statuses" :selected="$testProduct?->status" name="status" label="Select Status" />
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('test-product.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
