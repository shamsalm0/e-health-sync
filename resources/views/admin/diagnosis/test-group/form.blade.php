@row
    <x-form.text-input name="name" type="text" :value="$test_group->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="description" type="text" :value="$test_group->description" labelClass="" label="Description"
        placeholder="description" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('test-group.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
