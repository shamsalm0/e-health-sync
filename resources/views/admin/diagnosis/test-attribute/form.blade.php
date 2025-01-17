@row
    <x-form.text-input name="name" type="text" :value="$test_attribute->name" labelClass="required" label="Name" placeholder="Attribute name" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('test-attribute.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
