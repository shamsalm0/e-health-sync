@row
    <x-form.text-input name="name" type="text" :value="$product->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="short_name" type="text" :value="$product->short_name" labelClass="required" label="Short Name"
        placeholder="Short Name" />
    <x-form.text-input name="code" type="text" :value="$product->code" labelClass="required" label="Code"
        placeholder="code" />
    <x-form.select :options="$categories" :selected="$product->category_id" name="category_id" label="Select Subcategory" />
    <x-form.text-input name="type" type="text" :value="$product->type" label="type" placeholder="type" />
    <x-form.checkbox id="is_lab" name="is_lab" label="Is lab" :checked="$product->is_lab" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('store.product.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
