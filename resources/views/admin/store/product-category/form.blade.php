@row
    <x-form.text-input name="name" type="text" :value="$productCategory->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="code" type="text" :value="$productCategory->code" labelClass="" label="Code" placeholder="code" />
    <x-form.select :options="$parentCategories" :selected="$productCategory->parent_id" name="parent_id" label="Select Category" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('store.product-category.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
