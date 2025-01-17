@row
    <x-form.text-input name="name" type="text" :value="$grade->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="description" type="text" :value="$grade->description" labelClass="required" label="Description"
        placeholder="description" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('grades.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
